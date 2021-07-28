<template>
    <div class="offset-md-2 col-md-8">
        <!-- general form elements -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Create Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="">
                <div class="card-body">
                    <div class="form-group">
                        <label >Product Name</label>
                        <input type="text" name="name" class="form-control" id="Product" placeholder="product name">

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</template>

<script>
import store from '../../store';
import * as actions from '../../store/action-types';

export default {
    mounted(){
        store.dispatch(actions.GET_CATEGORIES)
    }
}
</script>


