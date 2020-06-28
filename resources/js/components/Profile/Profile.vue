<template>
    <div>
        <create-blog :dialog="createDialog"></create-blog>
        <div class="row justify-content-center">
            <div class="col-3 p-5">
                <img :src="(user.profile.image == null) ? '/storage/uploads/xqBqzOy3m5Yyf2df3J3Lfx7Ckhs9cS9OxH1j3BaM.png':user.profile.image" class="rounded-circle" style="width: 70%; border: solid 1px;">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>
                        <a v-if="iscan" :href="`/profile/${user.id}/edit`" style="text-decoration: none;">{{ user.username }}</a>
                        <span v-else>{{ user.username }}</span>
                    </h1>
                    <div>
                        <button v-if="iscan" type="button" class="btn btn-primary text-light" @click="createDialog = true">New Blog</button>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ posts.length }}</strong> posts</div>
                </div>
                <div class="pt-4 font-weight-bold">{{ user.profile.title }}</div>
                <div>{{ user.profile.dscp }}</div>
                <div><a href="#">{{ user.profile.url }}</a></div>
            </div>
        </div>
        <div class="row pt-5">
            <edit-blog :dialog="editDialog" :post="post" :iscan="iscan"></edit-blog>
            <div v-for="post in posts" :key="post.id" class="col-4 pb-4">
                <img :src="`/storage/${post.image}`" class="w-100 h-100" @click="showBlog(post)">
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['iscan', 'user', 'posts'],
    data () {
        return {
            createDialog: false,
            editDialog: false, post: "/storage/insert-image-here.jpg"
        }
    },
    methods: {
        showBlog (post) {
            this.post = post;
            this.editDialog = true;
        }
    }
}
</script>