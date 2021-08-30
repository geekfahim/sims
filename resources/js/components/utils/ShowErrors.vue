<template>
<div class="col-sm-12">
<div  v-if="isErrors" class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <li v-for="(item,index) in errors" :key="index">
        {{ item[0] }}
    </li>
</div>

</div>


</template>

<script>
import {mapGetters} from  'vuex'
export default {

    computed:{
        ...mapGetters({
            isErrors:'getIsErrors',
            errors:'getErrors'
        })

    }



}
</script>

<style>
</style>
