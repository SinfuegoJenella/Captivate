<template>
    <div class="list-div">
        <div class="list-head">
            <div class="list-title" >
                <b>
                    <router-link title="Click to open sprint Backlog" v-if="sprint.type == 2" :to="{name: 'sprint', params: {board_id: $route.params.board_id, sprint_id: sprint.id}}" style="color: #262626">{{ sprint.name }}</router-link>
                    <span v-if="sprint.type == 1">{{ sprint.name }} </span><span v-if="sprint.finished_at">(closed)</span>
                </b>
            </div>
            <div class="editListBtn pull-right">
                <small>{{ sprintPoints }} pts</small>
                <button v-if="sprint.type == 2" class="" @click="revert" title="Edit Sprint"><span class="fa fa-edit"></span></button>
                <button @click="deleteSprint(sprint.id)" v-if="sprint.type == 2" class="" title="Delete Sprint"><span class="fa fa-trash-o"></span></button>
                <button @click="showFinishSprintModal" v-if="sprint.type == 2 && sprint.finished_at == null" class="" title="Close Sprint?"><span class="fa fa-stop"></span></button>
            </div>
        </div>
        <div class="list-edit" v-if="showEditList">
            <div class="list-edit-input">
                <input @keyup.enter="updateSprint(sprint.id)" type="text" v-model="sprint.name" class="btn-block">
            </div>
            <div class="list-edit-save">
                <button @click="updateSprint(sprint.id)" class="btn-save">SAVE</button>
                <button class="btn-close btn btn-simple btn-default btn-xs" @click="revert" title="Cancel"><span class="fa fa-times"></span></button>
            </div>
        </div>
        <div class="list-body">
            <draggable v-model="sprint.tasks" :options="{animation:200, group:'status'}" :element="'div'" @change="sprintTaskUpdate($event, sprint.id)">
                <card-task v-for="(task, index) in sprint.tasks" :key="task.id" :task="task" :i="index"></card-task>                
                <div class="" v-if="noCard" style="background-color: transparent; height: 5px"></div>
            </draggable>
        </div>
        <router-link :to="{name: 'scrumboard_addtask', params: {sprint_id: sprint.id}}" class="add-task-btn" href=""><span class="icon-sm icon-add"></span><span>Add task</span></router-link>
        
        <div class="modal fade" :id="'sprint-finish-'+sprint.id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-small ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                         <h3>Close Sprint?</h3>
                    </div>
                    <div class="modal-body" style="margin-top: 0px; padding-top: 0;">
                        <h6 style="white-space: pre-wrap; overflow-wrap: break-word">All unfinished task will be move to backlog.</h6>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Go Back</button>
                        <button @click="finishSprint(sprint.id)" type="button" class="btn btn-success btn-simple">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable';
import Task from './CardTask.vue';
export default {
    components: {
        draggable,
        cardTask : Task
    },
    props: ['sprint'],
    data() {
        return {
            showEditList: false,
            noCard: true,
            openTaskOpt: false,
        }
    },
    mounted() {
        let taskdiv = document.querySelector("#scrumListDiv");
        taskdiv.scrollLeft = taskdiv.scrollWidth;
    },
    computed: {
        sprintPoints() {
            let points = 0;
            this.sprint.tasks.forEach(task => {
                points = points + Number(task.points)
            });

            return points;
        }
    },
    methods: {
        revert(){
            this.showEditList = !this.showEditList;
        },

        checkMove(event) {
            // console.log(event);
            var elmnt = document.querySelector('#scrumListDiv');
            let pos = event.pageX - $('#scrumListDiv').offset().left
            // console.log(`mouse position: ${pos}`);
            if(pos>1000) {
                elmnt.scrollBy(10, 0);
            }
            if(pos<200) {
                elmnt.scrollBy(-10, 0);
            }
        },

        updateSprint(id) {
            this.$store.dispatch('updateSprint', {id: id, name: this.sprint.name})
                .then(() => {
                    this.showEditList = false;
                })
        },

        deleteSprint(id) {
            this.$store.dispatch('deleteSprint', id)
                .then(() => {
                    this.$toaster.warning('Sprint deleted succesfully!.')
                })
        },

        sprintTaskUpdate(e, id) {
            this.$store.commit('mapSprintUpdateOrder', id);
            this.$store.dispatch('updateSprintOrder', this.sprint)
        },

        showFinishSprintModal(id) {
            $('#sprint-finish-'+this.sprint.id).modal('show');
        },

        finishSprint(id) {
            $('#sprint-finish-'+this.sprint.id).modal('hide');
            this.$store.dispatch('finishSprint', id)
                .then(() => {
                    
                })
        }
    }
}
</script>

<style lang="scss" scoped>

    .list-edit{
        padding: 5px 8px;
        background-color: whitesmoke;
        display: flex;

        .list-edit-input{
            display: inline-block;
            width: 70%;
            margin-right: 5px;
            input{
                border: 1px solid rgb(158, 158, 158);
                padding: 2px 3px;
                border-radius: 2px;
                border: 1px solid #4CAF50;
                font-size: 12px;
            }
        }

        .list-edit-save{
            display: inline-block;
            width: 20%;
            button.btn-save{
                width: 100%;
                box-shadow: none;
                border: none;
                border-radius: 2px;
                background-color: #4caf50;
                color: white;
                padding: 3px 5px;
                font-size: 11px;
            }
            button.btn-save:focus{
                background-color: #3e9140;
            }
            button.btn-close{
                padding: 3px 5px;
                font-size: 11px;
                margin: 0;
                border-radius: 2px;
            }
            button.btn-close:hover{
                color: rgb(235, 42, 42);
            }
        }

    }

    .list-head{
        background-color: #dcdcdc;
        position: relative;
    }

    .list-title{
        display:inline-block;
        padding: 5px 8px;
        color: rgb(38,38,38);
        width: 50%;
        font-size: 13px;
        font-style: bold;
        overflow-x: hidden;
    }

    .editListBtn{
        display:inline-block ;
        width: 50%;
        text-align: right;
        button{
            background: transparent;
            color: rgb(105, 105, 105);
            padding: 5px 9px;
            border: none;
            box-shadow: none;
            margin: 0;
            border-radius: 50%;
        }
        button:hover{
            background-color: rgb(199, 199, 199);
            color: rgb(92, 92, 92);
            transition: 0.5s;
        }
    }

    .list-body{
        background-color: rgb(234,234,234);
        max-height: 63vh; 
        overflow-y: auto !important;
        padding: 10px;
    }

    .list-footer{
        background-color: rgb(234,234,234);
    }

    .list-div{
        height: auto;
        width: 300px;
        overflow-y:visible;
        background-color:beige;
        padding: 0;
        margin-top: 10px;
        display: inline-block;
        margin-right: 10px;
        vertical-align:text-top;
    }
    .add-task-btn {
        border-radius: 0 0 3px 3px;
        color: #6b808c;
        display: block;
        flex: 0 0 auto;
        padding: 8px;
        position: relative;
        text-decoration: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .add-task-btn:hover {
        background-color: #DCDCDC;
    }
    
</style>
