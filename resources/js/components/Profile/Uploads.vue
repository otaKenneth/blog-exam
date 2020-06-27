<template>
    <div class="row pt-5">
        <edit-blog :dialog="dialog" :post="post"></edit-blog>
        <div v-for="post in posts" :key="post.id" class="col-4 pb-4">
            <img :src="`/storage/${post.image}`" class="w-100 h-100" @click="showBlog(post)">
        </div>
    </div>
</template>
<script>
export default {
    props: ['posts'],
    data () {
        return {
            dialog: false, post: "/storage/insert-image-here.jpg"
        }
    },
    methods: {
        showBlog (post) {
            this.post = post;
            this.dialog = true;
        }
    }
}
</script>