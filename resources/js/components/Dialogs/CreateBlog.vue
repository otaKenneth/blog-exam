<template>
    <div>
        <v-dialog v-model="dialog" persistent max-width="50vw">
            <v-card>
                <v-card-title class="justify-content-between bg-primary">
                    <h3 class="text-light">New Blog</h3>
                    <button type="button" class="btn btn-light" style="font-weight: bold; color: red;" @click="$parent.createDialog = false">X</button>
                </v-card-title>

                <v-card-text>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="img-container">
                                <img src="/storage/insert-image-here.jpg" alt="" @click="uploadImg" class="emp_img cursor-pointer" data-toggle="toggle" title="Click to Upload Picture">
                            </div>
                            <div class="d-none">
                                <input type="file" name="image" id="image" @change="readUrl">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="title" class="font-semibold">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="I'm a Title" aria-describedby="helpId" v-model="post.title">
                                <small v-if="errors.title" id="helpId" class="text-danger">{{ errors.title[0] }}</small>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10" v-model="post.description"></textarea>
                                <small v-if="errors.description" id="helpId" class="text-danger">{{ errors.description[0] }}</small>
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary text-light" @click="createBlog">Save</button>
                            </div>
                        </div>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
    export default {
        props: ['dialog'],
        data () {
            return {
                errors: [], post: {
                    image: '',
                    title: '',
                    description: '',
                },
            }
        },
        methods: {
            uploadImg () {
                $('#image').click();
            },
            readUrl (ev) {
                if (ev.target.files && ev.target.files[0]) {
                    var reader = new FileReader();

                    reader.onload = (e) => {
                        $('.emp_img').attr('src', e.target.result);
                    };

                    this.post.image = ev.target.files[0];
                    reader.readAsDataURL(ev.target.files[0]);
                }
            },
            createBlog () {
                // for image uploading
                let formData = new FormData();
                formData.append('image', this.post.image);
                formData.append('title', this.post.title);
                formData.append('description', this.post.description);
                
                axios.post("/p", formData, {
                    headers: {
                        'Content-Type' : 'multipart/form-data'
                    }
                }).then( response => {
                    this.$parent.posts.unshift(response.data);
                    this.$parent.createDialog = false
                    // location.href = "";
                }).catch( errors => {
                    this.errors = errors.response.data.errors;
                });
            }
        }
    }
</script>