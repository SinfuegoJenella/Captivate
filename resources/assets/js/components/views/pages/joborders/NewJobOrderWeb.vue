<template>
    <section class="main-main-container" style="">
        <div class="title-head">
            <h2><span class="fa fa-file-o"></span> Job Order Form - Web <small>Panel</small></h2>
        </div>

        <div class="first-column col-md-1"></div>

        <div class="col-md-10">
            <div class="joform">
                <div class="jo-head">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="noprint"><span class="fa fa-file-code-o"></span> Job Order Form <small>(Web)</small>
                            &nbsp;&nbsp;&nbsp;
                                <span class="pull-right">
                                    <small>
                                        <select v-model="brand.status" class="my-input">
                                            <option value="1">Active</option>
                                            <option value="2">Completed</option>
                                            <option value="3">Blocked</option>
                                        </select>
                                    </small>
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="jo-body">
                <form @submit.prevent="newWebJO">
                    <!--BRAND CLIENT ACMA -->
                    <div class="row form-row">
                        <div class="col-md-3 form-group">
                            <label for="jo_name">Name </label>
                            <input required v-model="brand.name" name="jo_name" id="jo_name" type="text" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="brand">Brand:</label>
                            <div class="btn-group bootstrap-select">
                                <select required v-model="brand.brand_id" class="selectpicker" data-style="btn btn-sm btn-info btn-simple" type="text">
                                        <option value="">---</option>
                                        <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{ brand.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="brand">Board:</label>
                            <div class="btn-group bootstrap-select">
                                <select name="board_id" class="selectpicker" data-style="btn btn-sm btn-info btn-simple" type="text">
                                    <option value="">---</option>
                                    <option value="">Board 1</option>
                                    <option value="">Board 1</option>
                                    <option value="">Board 1</option>
                                    <option value="">Board 1</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-3 form-group">
                            <label for="brand">Client:</label>
                            <div class="btn-group bootstrap-select">
                                <select class="selectpicker" data-style="btn btn-sm btn-info btn-simple" type="text">
                                    <option value="">Aya</option>
                                    <option value="">Marley</option>
                                    <option value="">Kwini</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">ACMA / Brand Owner:</label>
                            <div class="btn-group bootstrap-select">
                                <select multiple class="selectpicker" data-style="btn btn-sm btn-info btn-simple" type="text">
                                    <option value="">Aya</option>
                                    <option value="">Marley</option>
                                    <option value="">Kwini</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-3 form-group">
                            <label for="" class="align-right">JO No.</label>
                            <img class="pull-right" style="height: 70px" src="/images/above-art1.jpg" alt="">
                        </div>
                    </div>
                    <!--./end of BRAND CLIENT ACMA -->

                    <hr />

                    <div class="row form-row">
                        <!--TIME IN and DUE -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><span class="fa fa-calendar-o text-success"></span> Date In
                                    <small><i> (dd-mm-yyyy)</i></small></label>
                                <input required v-model="brand.date_in" class="form-control" type="date" />
                            </div>
                            <div class="form-group">
                                <label for=""><span class="fa fa-calendar-o text-danger"></span> Date Due
                                    <small><i> (dd-mm-yyyy)</i></small></label>
                                <input required v-model="brand.date_due" class="form-control" type="date" />
                            </div>
                        </div>
                        <!--./end of TIME IN and DUE -->

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="rqst_type">Request Type:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input v-model="details.request_type" value="1" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Information Update
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input v-model="details.request_type" value="2" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Page Deletion
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input v-model="details.request_type" value="3" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Additional Page
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input v-model="details.request_type" value="4" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Setup Mail (Zoho)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input v-model="details.request_type" value="5" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Contact Details Change
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input v-model="details.request_type" value="6" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            URL & Domain Change
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="checkbox">
                                        <label>
                                            <input v-model="details.request_type" value="7" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Others
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row form-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rqst_type">TECH:</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" v-model="details.tech" value="1" name="tech"><span class="check"></span>
                                        Request for Domain Purchase
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" v-model="details.tech" value="2" name="tech"><span class="check"></span>
                                        With Previous Domain
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rqst_type">Domain Transfer:</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" v-model="details.domain_transfer" value="1" name="transfer"><span class="check"></span>
                                        Domain Unlocked
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" v-model="details.domain_transfer" value="2" name="transfer"><span class="check"></span>
                                        Auth/EPP Code Provided
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rqst_type">Domain Renewal:</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" v-model="details.domain_renewal" value="1" name="renewal"><span class="check"></span>
                                        Domain for Renewal
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" v-model="details.domain_renewal" value="2" name="renewal"><span class="check"></span>
                                        Change Domain
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col md-12">
                                    <div class="">
                                        <div class="col-md-4">
                                            <h6 class="text-default">OLD HOST cPANEL</h6>
                                            <div class="form-group">
                                                <label for="" class="">Username</label>
                                                <input v-model="details.old_cpanel_uname" type="text" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input v-model="details.old_cpanel_password" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="text-default">NEW HOST cPANEL</h6>
                                            <div class="form-group">
                                                <label for="" class="">Username</label>
                                                <input v-model="details.new_cpanel_uname" type="text" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input v-model="details.new_cpanel_password" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="text-default">Tracker</h6>
                                            <div class="form-group">
                                                <label for="" class="">Date Commerced</label>
                                                <input v-model="details.date_commerced" type="date" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Date Ended</label>
                                                <input v-model="details.date_ended" type="date" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />
                                    <br />
                                    <div class="">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="">NOTES & ACTION POINTS:</label>
                                                <textarea v-model="details.action_points" class="my-text-area btn-block" rows="5" placeholder="Write your notes here..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="jo-body" style="background-color: whitesmoke">
                        <div class="row pb-10">
                            <div class="col-md-12">
                                <h5>Add Task 
                                <span><button type="button" @click="addNewTask" class="btn btn-success btn-fab btn-fab-mini"
                                        rel="tooltip" data-original-title="Click to add new task form" data-placement="right">
                                    <!-- <span class="fa fa-plus"></span> -->
                                    +
                                    </button></span>
                                </h5>
                            </div>

                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                    
                            <div class="row" id="addtaskdiv">
                                <div class="col-md-12">
                                    <div class="card taskcard" v-for="(task, index) in tasks" :key="index">
                                        <span class="pull-right" @click="deleteTaskForm(index)" style="cursor:pointer"><i class="fa fa-times"></i></span>
                                        <h5 class="text-gray"><span class="fa fa-tasks"></span> Task #{{index+1}}</h5>
                                        <div class="form-row">
                                            <div class="col-md-7">
                                                <label for="">Name </label>
                                                <input v-model="task.name" type="text" class="form-control">
                                                <label for="">Decription </label>
                                                <textarea type="text" v-model="task.desc" class="btn-block" placeholder="" ></textarea>
                                            </div>
                                            <div class="col-md-5">
                                                <label for=""><span class="fa fa-user-o"></span> Assign to </label>
                                                <select class="btn-block" >
                                                    <option value="">Shooky</option>
                                                    <option value="">Chimmy</option>
                                                    <option value="">RJ</option>
                                                </select>
                                                <label for="" style="margin-top: 8px"><span class="fa fa-file-o"></span> Attach File</label>
                                                <input id="taskFiles" @change="onFileChange($event, index)" class="btn-block" type="file" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    </div>

                    <hr>
                     <div class="row">
                        <!-- <div class="col-md-12">
                                <label for="rqst_type">Status:</label> 
                                </div> -->
                                <div class="col-md-4">
                                    <label for="rqst_type">Accomplish list below before going live:</label> 
                                    <div class="checkbox mr-10">
                                        <label>
                                            <input v-model="details.target_list" value="1" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            All numbers are working/reachable
                                        </label>
                                    </div>
                                    <div class="checkbox mr-10">
                                        <label>
                                            <input v-model="details.target_list" value="2" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            All emails are working/not bouncing
                                        </label>
                                    </div>
                                    <div class="checkbox mr-10">
                                        <label>
                                            <input v-model="details.target_list" value="3" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            ACMA/BO approved for posting
                                        </label>
                                    </div>
                                    <div class="checkbox mr-10">
                                        <label>
                                            <input v-model="details.target_list" value="4" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Copy has been proofed
                                        </label>
                                    </div>
                                    <div class="checkbox mr-10">
                                        <label>
                                            <input v-model="details.target_list" value="5" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Prices of products/services are accurate
                                        </label>
                                    </div>
                                    <div class="checkbox mr-10">
                                        <label>
                                            <input v-model="details.target_list" value="6" type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            All URL links in menu are working
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- <div class="checkbox mr-10">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Revisions Below
                                        </label>
                                    </div> -->
                                    <label for="rqst_type">Proofed by (Web Team):</label>
                                    <div class="checkbox mr-10">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Check this to confirm proofing.
                                        </label>
                                        <p class="note">Please enter email and password for verification.</p>
                                        <input class="form-control my-input mb-5" type="email" placeholder="Email...">
                                        <input class="form-control my-input" type="password" placeholder="Password...">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Changes Approved by: (ACMA+BO)</label>
                                    <div class="checkbox mr-10">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span class="check"></span>
                                            Check this to approve changes.
                                        </label>
                                    </div>
                                    <p class="note">Please enter email and password for verification.</p>
                                        <input class="form-control my-input mb-5" type="email" placeholder="Email...">
                                        <input class="form-control my-input" type="password" placeholder="Password...">
                                </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success btn-md btn-block" type="submit">
                                DONE!
                            </button>
                        </div>
                    </div>

                   
                </form>
                </div>


                
            </div>
        </div>
        <div class="col-md-1">

        </div>

        <div class="modal fade" id="SuccesNewJoWeb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-small ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h3>Success!!</h3>
                    </div>
                    <div class="modal-body text-center">
                        <h5>Go to JO List? </h5>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Cancel</button>
                        <button @click="success()" type="button" class="btn btn-success btn-simple">Yes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ErrorNewJoWeb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-small ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                         <h3>Error!!</h3>
                    </div>
                    <div class="modal-body text-center">
                        <h5>Network Error</h5>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Cancel</button>
                        <button @click="this.$router.push({name: 'all_jo_list'})" type="button" class="btn btn-success btn-simple">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {mapGetters} from 'vuex';
export default {
    data(){
        return{
            tasks: [
                {name: '',desc: '',files: []}
            ],
            brand: {
                name: '',
                brand_id: '',
                status: 1,
                date_in: '',
                date_due: ''
            },
            details: {
                target_list: [],
                request_type: [],
                tech: null,
                domain_transfer: null,
                domain_renewal: null,
                action_points: '',
                old_cpanel_uname: '',
                new_cpanel_uname: '',
                old_cpanel_password: '',
                new_cpanel_password: '',
                date_commerced: null,
                date_ended: null
            },
            attachments: []
        }
    },
    created() {
        this.$store.dispatch('onCreate');
        console.log(this.brands);
    },
    mounted() {
        // $('#ErrorNewJoWeb').modal('show');
    },
    computed: {
        ...mapGetters({
                brands: 'getBrands',
            }),        
    },
    methods: {
        addNewTask(){
            this.tasks.push({
                name: '',
                desc: '',
                files: []
            });
            this.scrollToEnd()
        },
        deleteTaskForm(index){
            this.tasks.splice(index,1)
        },
        scrollToEnd(){
            var taskdiv = document.querySelector("#addtaskdiv")
            // var scrollHeight = taskdiv.scrollHeight + 200
            taskdiv.scrollTop = taskdiv.scrollHeight

        },

        newWebJO() {
            let form = new FormData;
            form.append('brand', JSON.stringify(this.brand));
            form.append('details', JSON.stringify(this.details));
            form.append('tasks', JSON.stringify(this.tasks));
            for(let i=0; i<this.attachments.length;i++){
                form.append('files[]',this.attachments[i]);
            }
            this.$store.dispatch('newJOW', form)
                .then ((response) => {
                    $('#SuccesNewJoWeb').modal('show');
                })    
        },

        success() {
            $('#SuccesNewJoWeb').modal('hide');
            this.$router.push({name: 'all_jo_list'})
        },

        onFileChange(e, index) {
            this.tasks[index].files = [];
            this.attachments = [];
            let selectedFiles=e.target.files;
            if(!selectedFiles.length){
                return false;
            }
            for(let i=0;i<selectedFiles.length;i++){
                let file = {filename: selectedFiles[i].name, type: selectedFiles[i].type}
                this.tasks[index].files.push(file);
                this.attachments.push(selectedFiles[i]);
            }
            // document.getElementById('taskFiles').value=[];
            // console.log(this.tasks[index].files);
        }
    }
}
</script>

<style scoped lang="scss" scoped>
    @media print{
        .nav-side-menu, noprint{
            display: none;
        }
    }
    table{
        border: 1px solid gray !important;
    }
    label{
        color: #868686 !important;
        font-weight: 700 !important;
        font-size: 0.9em !important;
    }

    .btn-group, .btn-group-vertical {
        position: relative;
        margin: 2px 1px;
    }

    label > small{
        font-weight: normal;
    }
    .jo-barcode{
        margin-top: 10px;
        margin-right: 10px;
        width: 100px;
        height: 100px;
        border: 1px solid gray;
    }
    .btn-group bootstrap-select{
        margin-top: 0px !important;
        margin-bottom: 7px !important;
    }
    div.checkbox > label{
        font-weight: normal !important;
    }
</style>

