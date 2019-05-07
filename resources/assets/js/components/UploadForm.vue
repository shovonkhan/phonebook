<template>
	<div>
			<!-- <form action="{{ route('upload') }}" method="post" accept-charset="utf-8" enctype="Multipart/form-data"> -->
			<!-- {{ csrf_field() }} -->
			<input type="file" name="image" @change="GetImage">
			<img :src="avatar" alt="Image">
			<a href="#" class="btn btn-success" @click.prevent="upload">Upload</a>
		<!-- </form> -->
	</div>
	
</template>

<script>
	export default {
		data(){
			return{
				avatar:null
			}
		},
		methods:{
			GetImage(e){
				// console.log(e.target.files)
				let image =e.target.files[0]
				let reader = new FileReader();
				reader.readAsDataURL(image);
				reader.onload = e =>{
					// console.log(e)
					this.avatar = e.target.result
				}
			},
			upload(){
				axios.post('/upload',{'image':this.avatar})
			}
		}
	}
</script>