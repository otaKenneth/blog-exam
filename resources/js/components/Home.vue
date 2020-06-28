<template>
    <div>
        <div v-if="posts.length > 0">
            <div v-for="post in $root.posts" :key="post.id"  class="row justify-content-center">
                <div class="row col-8 mb-3" style="box-shadow: 0 0 1px 0 #e9ebec;">
                    <div class="col-6">
                        <img :src="`/storage/${post.image}`" class="w-100">
                    </div>
                    <div class="col-6">
                        <div class="p-2" style="border-bottom: solid #dadada 1px">
                            <div class="pr-3 d-flex">
                                <div class="rounded-circle"
                                    style="max-width: 30px; height: 30px; overflow: hidden; border: solid 1px;">
                                    <img :src="(post.user.profile.image == null) ? '/storage/uploads/xqBqzOy3m5Yyf2df3J3Lfx7Ckhs9cS9OxH1j3BaM.png':post.user.profile.image" class="w-100">
                                </div>
                                <div class="pt-1 pl-2 font-weight-bold">
                                    <span v-if="isguest" class="text-dark">{{ post.user.username }}</span>
                                    <a v-else :href="`/profile/${post.user.id}`" class="text-dark">
                                        {{ post.user.username }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <h4>{{ post.title }}</h4>
                            <p>{{ post.description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="row justify-content-center">
                <h1 v-if="isguest"><b>Create</b> an account and <b>Add</b> a blog post!</h1>
                <h1 v-else><b>Add</b> a blog post now!</h1>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['isguest', 'posts'],
    data () {
        return {
            
        }
    },
    mounted () {
        this.$root.records = this.posts;
        this.$root.posts = this.$root.records;
    }
}
</script>