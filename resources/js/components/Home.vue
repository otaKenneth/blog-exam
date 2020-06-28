<template>
    <section>
        <div v-if="$root.search !== ''">
            <div v-for="post in $root.posts" :key="post.id"  class="row justify-content-center">
                <div class="row col-8 mb-3" style="box-shadow: 0 0 1px 0 #e9ebec;">
                    <div class="col-6">
                        <img :src="`/storage/${post.image}`" class="w-100">
                    </div>
                    <div class="col-6">
                        <div class="p-2" style="border-bottom: solid #dadada 1px">
                            <div class="pr-3 d-flex">
                                <div class="" style="max-width: 30px; height: 30px; overflow: hidden;">
                                    <img :src="(post.user.profile.image == null) ? '/storage/uploads/xqBqzOy3m5Yyf2df3J3Lfx7Ckhs9cS9OxH1j3BaM.png':post.user.profile.image" class="w-100">
                                </div>
                                <div class="pt-1 pl-2 font-weight-bold">
                                    <span v-if="isguest" class="text-dark">{{ post.user.username }}</span>
                                    <a v-else :href="`/profile/${post.user.id}`" class="text-dark">
                                        {{ post.user.username }}
                                    </a>
                                </div>
                                <div class="w-100 py-1 text-right">{{ post.created_at }}</div>
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
            <div class="col-6" style="height: 70vh; margin: auto;">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 100%;">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="height: 100%;">
                        <div v-for="(post, key) in posts.slice(0, 3)" :key="post.id" class="carousel-item bg-dark" :class="key == 0 ? 'active':''" style="height: 100%;"> 
                            <img class="d-block" style="height: 100%; margin: auto;" :src="`/storage/${post.image}`" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ post.title }}</h5>
                                <p>{{ post.description}}</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center my-4">
                <h1 v-if="isguest"><b>Create</b> an account and <b>Add</b> a blog post!</h1>
                <h1 v-else><b>Add</b> a blog post now!</h1>
            </div>
            <div class="row justify-content-center">
                <div v-for="(post, key) in posts.slice(2, 6)" :key="key" class="ml-3" style="width: 300px;">
                    <img :src="`/storage/${post.image}`" alt="Image" class="w-100" style="height: 100%">
                    <div class="d-block text-center mt-2">
                        <h5 style="font-weight: bold;">{{ post.title }}</h5>
                        <p>{{ post.description.substring(0, 20) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
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