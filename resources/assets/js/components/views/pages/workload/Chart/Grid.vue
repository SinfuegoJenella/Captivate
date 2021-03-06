<!--
/**
 * @fileoverview Grid component
 * @license MIT
 * @author Rafal Pospiech <neuronet.io@gmail.com>
 * @package GanttElastic
 */
-->
<template>
  <svg
    class="gantt-elastic__grid-lines-wrapper"
    :style="root.style('grid-lines-wrapper')"
    ref="chart"
    x="0"
    y="0"
    :width="root.state.width"
    :height="root.state.allVisibleTasksHeight"
    xmlns="http://www.w3.org/2000/svg"
  >
    <g class="gantt-elastic__grid-lines" :style="root.style('grid-lines')">
      <line
        class="gantt-elastic__grid-line-horizontal"
        :style="root.style('grid-line-horizontal')"
        v-for="line in horizontalLines"
        :key="line.key"
        :x1="line.x1"
        :y1="line.y1"
        :x2="line.x2"
        :y2="line.y2"
      ></line>
      <line
        class="gantt-elastic__grid-line-vertical"
        :style="root.style('grid-line-vertical')"
        v-for="line in verticalLines"
        :key="line.key"
        :x1="line.x1"
        :y1="line.y1"
        :x2="line.x2"
        :y2="line.y2"
        v-if="line.inViewPort"
      ></line>
      <line
        class="gantt-elastic__grid-line-time"
        :style="root.style('grid-line-time')"
        :x1="timeLinePosition.x"
        :y1="timeLinePosition.y1"
        :x2="timeLinePosition.x"
        :y2="timeLinePosition.y2"
      ></line>
    </g>
  </svg>
</template>

<script>
export default {
  inject: ["root"],
  data () {
    return {};
  },
  created () {
    this.root.$on("recenterPosition", this.recenterPosition);
  },
  mounted () {
    this.$nextTick(() => {
      this.$nextTick(() => {
        // because of stupid slider :/
        this.root.scrollToTime(this.timeLinePosition.time);
      });
    });
  },
  methods: {
    recenterPosition () {
      this.root.scrollToTime(this.timeLinePosition.time);
    },
  },
  computed: {
    verticalLines () {
      let lines = [];
      const state = this.root.state;
      state.times.steps.forEach(step => {
        lines.push({
          key: step.date.valueOf(),
          x1: step.offset.px,
          y1: 0,
          x2: step.offset.px,
          y2: state.tasks.length * (state.row.height + state.grid.horizontal.gap * 2) + this.root.style('grid-line-vertical').strokeWidth,
          inViewPort: this.root.isInsideViewPort(step.offset.px, 1)
        });
      });
      return lines;
    },
    horizontalLines () {
      let lines = [];
      const state = this.root.state;
      let tasks = this.root.visibleTasks;
      for (let index = 0, len = tasks.length; index <= len; index++) {
        lines.push({
          key: "hl" + index,
          x1: 0,
          y1: (index * (state.row.height + state.grid.horizontal.gap * 2) + this.root.style('grid-line-vertical').strokeWidth / 2),
          x2: "100%",
          y2: (index * (state.row.height + state.grid.horizontal.gap * 2) + this.root.style('grid-line-vertical').strokeWidth / 2)
        });
      }
      return lines;
    },
    inViewPort () {
      return line => {
        const state = this.root.state;
        return (line.x1 >= state.scroll.chart.left && line.x1 <= state.scroll.chart.right);
      };
    },
    timeLinePosition () {
      const d = new Date();
      const current = d.getTime();
      const currentOffset = this.root.timeToPixelOffsetX(current);
      const timeLine = {
        x: 0,
        y1: 0,
        y2: "100%",
        dateTime: "",
        time: current
      };
      timeLine.x = currentOffset;
      timeLine.dateTime = d.toLocaleDateString();
      return timeLine;
    },
  }
};
</script>
