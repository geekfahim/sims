<template>
	<div class="row">
            <show-errors></show-errors>
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">Create Product</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->

				<form
					@submit.prevent='onSubmit'
					class="form-horizontal"
					method='post'
					enctype="multipart/form-data"
				>
					<div class="card-body">
						<div class="form-group">
							<label>Product<span class="text-danger">*</span></label>
							<input
								v-model="formData.name"
								type="text"
								class="form-control"
								placeholder="name"
								value=""
							/>
						</div>
						<div class="form-group">
							<label>Category<span class="text-danger">*</span></label>
							<Select2
								v-model="formData.category_id"
								:options="categories"
								:settings="dropdownSettings"
							/>
						</div>
						<div class="form-group">
							<label>Brand<span class="text-danger">*</span></label>
							<Select2
								v-model="formData.brand_id"
								:options="brand"
								:settings="dropdownSettings"
							/>
						</div>
						<div class="form-group">
							<label for="">SKU<span class="text-danger">*</span></label>
							<input
								v-model="formData.sku"
								type="text"
								class="form-control"
								placeholder="SKU"
							/>
						</div>
						<div class="form-group">
							<label for="">Cost Price<span class="text-danger">*</span></label>
							<input
								v-model="formData.cost_price"
								type="text"
								class="form-control"
								placeholder="cost price"
								value=""
							/>
						</div>
						<div class="form-group">
							<label for="">Retail Price<span class="text-danger">*</span></label>
							<input
								v-model="formData.retail_price"
								type="text"
								class="form-control"
								placeholder="retail price"
								value=""
							/>
						</div>
						<div class="form-group">
							<label for="">Year<span class="text-danger">*</span></label>
							<input
								v-model="formData.year"
								type="text"
								class="form-control"
								placeholder="Year"
								value=""
							/>
						</div>
						<div class="form-group">
							<label for="">Image<span class="text-danger">*</span></label>
							<input
								@change="selectImage"
                                v-model="formData.image"
								type="file"
								class="form-control"
								placeholder="image"
								value=""
							/>
						</div>
						<div class="form-group">
							<label>Description<span class="text-danger">*</span></label>
							<input
								v-model="formData.description"
								type="text"
								class="form-control"
								placeholder="Description[Max:200]"
								value=""
							/>
						</div>
						<div class="form-group">
							<label>Status<span class="text-danger">*</span></label>
							<select
								class="form-control"
								v-model="formData.status"
							>
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button
							type="submit"
							class="btn btn-primary"
						>
							<i class="fas fa-save"></i> Submit
						</button>
					</div>
					<!-- card body -->
				</form>
			</div>
			<!-- /.card -->
		</div>
		<div class="col-md-6">
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">Size</h3>
				</div>
				<div class="card-body">
					<div
						class="row mb-2"
						v-for="(item,index) in formData.items"
						:key="index"
					>
						<div class="col-md-4">
							<select
								class="form-control form-control-sm"
								v-model="item.size_id"
								id=""
							>
								<option value="">Select Size</option>
								<option
									v-for="(item,index) in sizes"
									:key="index"
									value="item.id"
								>{{item.name}}</option>
							</select>
						</div>
						<div class="col-md-3">
							<input
								type="text"
								v-model="item.location"
								class="form-control form-control-sm"
								placeholder="location"
							>
						</div>
						<div class="col-md-3">
							<input
								type="number"
								v-model="item.quantity"
								class="form-control form-control-sm"
								placeholder="quantity"
							>
						</div>
						<div class="col-md-2">
							<button
								@click="deleteItem(index)"
								class="btn btn-sm btn-danger"
							><i class="fas fa-trash-alt"></i></button>
						</div>
					</div>
					<button
						@click='addItem'
						class="btn btn-xs btn-primary"
					>
						<i class="fas fa-plus"></i> Add New Size
					</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import store from "../../store";
import * as actions from "../../store/action-types";
import { mapGetters } from "vuex";
import Select2 from "v-select2-component";
import ShowErrors from "../utils/ShowErrors";

export default {
	components: {
		Select2,
		ShowErrors,
	},

	data() {
		return {
			dropdownSettings: {
				multiple: false,
				width: "100%",
				placeholder: "Select One",
				minimumInputLength: 1,
			},
			formData: {
				name: "",
				category_id: "",
				brand_id: "",
				items: [
					{
						size_id: "",
						location: "",
						quantity: "",
					},
				],
				sku: "",
				image: "",
				cost_price: 0,
				retail_price: 0,
				year: "",
				description: "",
				status: "",
			},
		};
	},
	methods: {
		selectImage(e) {
			console.log(e.target.files[0]);
			this.formData.image = e.target.files[0];
		},
		addItem() {
			let item = {
				size_id: "",
				location: "",
				quantity: "",
			};
			this.formData.items.push(item);
		},
		deleteItem(index) {
			this.formData.items.splice(index, 1);
		},
		onSubmit() {
			let data = new FormData();
			data.append("category_id", this.formData.category_id);
			data.append("brand_id", this.formData.brand_id);
			data.append("sku", this.formData.sku);
			data.append("name", this.formData.name);
			data.append("image", this.formData.image);
			data.append("cost_price", this.formData.cost_price);
			data.append("retail_price", this.formData.retail_price);
			data.append("year", this.formData.year);
			data.append("description", this.formData.description);
			data.append("status", this.formData.status);
			data.append("items", this.formData.items);
			data.append("category_id", this.formData.category_id);
			// console.log(this.formData.image);
			store.dispatch(actions.ADD_PRODUCT, this.formData);
		},
	},

	computed: {
		...mapGetters({
			categories: "getCategories",
			brand: "getBrand",
			sizes: "getSizes",
		}),
	},
	mounted() {
		store.dispatch(actions.GET_CATEGORIES);
		store.dispatch(actions.GET_BRAND);
		store.dispatch(actions.GET_SIZES);
	},
};
</script>
