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
						<label>Product Name</label>
						<input
							type="text"
							name="name"
							class="form-control"
							id="Product"
							placeholder="product name"
						/>
					</div>
					<div class="form-group">
						<label>Product Category</label>
						<Select2 v-for=""  v-model="formData.category_id" :options="categories" :settings="categorySettings"/>
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
import Select2 from "v-select2-component";
import store from "../../store";
import * as actions from "../../store/action-types";
import { mapGetters } from "vuex";

export default {
	components: { Select2 },
	data() {
		return {
        categorySettings:{
                multiple: false,
                width: '100%',
                placeholder: 'Select One',
                minimumInputLength: 1,
        },
			formData: {
				category_id: 0,
			},
		};
	},
	computed: {
		...mapGetters({
			categories: "getCategories",
		}),
	},
	mounted() {
		store.dispatch(actions.GET_CATEGORIES);
	},
};
</script>


