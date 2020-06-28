<template>
    <div class="d-flex">
        <div class="form-group m-0 mr-3">
            <select class="form-control" name="" id="str-filter" v-model="$root.filter">
                <option value="author">Author</option>
                <option value="title">Title</option>
                <option value="description">Description</option>
            </select>
        </div>
        <input type="text" name="search" id="search" class="form-control" placeholder="Search" autofocus autocomplete="off" v-model="$root.search">
    </div>
</template>
<script>
export default {
    
}
</script>