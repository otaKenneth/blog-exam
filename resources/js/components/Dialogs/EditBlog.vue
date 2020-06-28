<template>
    <v-dialog v-model="dialog" persistent max-width="50vw">
        <v-card>
            <v-card-title class="justify-content-between bg-primary">
                <h3 class="text-light">{{ post.title }}</h3>
                <button type="button" class="btn btn-light" style="font-weight: bold; color: red;" @click="dialog = false">X</button>
            </v-card-title>

            <v-card-text>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="img-container">
                            <img :src="`/storage/${post.image}`" alt="" @click="uploadImg" class="emp_img cursor-pointer" data-toggle="toggle" title="Click to Upload Picture">
                        </div>
                        <div class="d-none">
                            <input type="file" name="image" id="image" @change="readUrl" :disabled="!iscan">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="title" class="font-semibold">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="I'm a Title" aria-describedby="helpId" v-model="post.title" :disabled="!iscan">
                            <small v-if="errors.title" id="helpId" class="text-danger">{{ errors.title[0] }}</small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10" v-model="post.description" :disabled="!iscan"></textarea>
                            <small v-if="errors.description" id="helpId" class="text-danger">{{ errors.description[0] }}</small>
                        </div>
                        
                        <div class="d-flex justify-content-end" v-if="iscan">
                            <button type="button" class="btn btn-primary text-light" @click="updateBlog">Save</button>
                            <button type="button" class="btn btn-danger text-light ml-2" @click="deleteBlog">Delete</button>
                        </div>
                    </div>
                </div>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>
<script>
export default {
    props: ['post', 'dialog', 'iscan'],
    data () {
        return {
            image_update: false,
            errors: [],
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
        updateBlog () {
            let formData = new FormData();
            formData.append('image', this.post.image);
            formData.append('title', this.post.title);
            formData.append('description', this.post.description);
            
            axios.post(`/p/${this.post.id}`, formData, {
                headers: {
                    'Content-Type' : 'multipart/form-data'
                }
            }).then( response => {
                // this.posts.push(response.data);
                location.href = "";
            }).catch( errors => {
                this.errors = errors.response.data.errors;
            });
        },
        deleteBlog () {
            axios.delete(`/p/${this.post.id}`).then( response => {
                location.href = "";
            }).catch( errors => {
                this.errors = errors.response.data.errors;
            })
        }
    }
}
</script>