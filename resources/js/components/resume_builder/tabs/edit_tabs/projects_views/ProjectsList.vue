<template>
    <div class="wrapper">


        <div class="btns-wrapper d-flex align-items-center">
            <router-link to="/resume-builder/edit/projects/new" class="btn outline" >
                <svg-vue class="icon add-project-icon" icon="add-icon"></svg-vue>
                <b>Add a new project</b>
            </router-link>
        </div>

        <div class="projects-container d-flex flex-wrap">
            <div v-for="(project,index) in projects" :key="'project_' + index" class="d-flex flex-column mb-3">
                <div class="project">
                    <img :src="getMainImage(project)" alt="">
                    <a class="d-flex justify-content-center align-items-center remove-icon"
                       href="javascript:void(0)" @click="deleteProject(project)">
                        <svg-vue icon="remove-icon"></svg-vue>
                    </a>
                </div>
                <div class="project-name">
                    {{project.name}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProjectsList",
        data(){
            return{

            }
        },
        computed: {
            projects() {
                return this.$store.state.user.projects;
            }
        },
        methods:{
            getMainImage(project){
                let mainImageSrc = '' ;
                project.images.forEach( (image) => {
                    image.is_main ? mainImageSrc = image.src : '' ;
                });

                return mainImageSrc;
            },
            deleteProject(project){
                if (!confirm('Do you want to delete this project ?')) {
                    return;
                }
                axios.delete('/api/user/projects/' + project.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.projects.forEach( (myProject,index) => {
                            if(myProject.id === response.data.data.id){
                                this.projects.splice(index,1);
                            }
                        });
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        },
    }
</script>

<style scoped lang="scss">
    $mainBlue: #001CE2;
    .content {
        position: relative;
    }

    .projects-container {
        margin-top: 32px;

    }

    .project {
        position: relative;
        margin-right: 87px;

        .remove-icon {
            opacity: 0;
            transition: all .5s ease;
            background: white;
            position: absolute;
            right: 14px;
            top: 14px;
            width: 53px;
            height: 53px;
            box-shadow: -3px 10px 15px #e5e5e5;
            border-radius: 5px;

            svg {
                width: 23px;
                height: 23px;
            }
        }

        &:hover .remove-icon {
            opacity: 1;
            transition: all .5s ease;
        }

        img {
            width: 477px;
            height: 359px;
        }

    }

    .project-name{
        margin-top: 15px;
        font-size: 24px;
        font-weight: 600;
    }



    .add-project-icon {
        width: 31px;
        height: 31px;
    }
</style>
