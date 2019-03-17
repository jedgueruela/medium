<template>
	<div class="flex justify-center">
		<article class="w-1/2 my-8">
			<template v-if="loading">Loading...</template>
			<div v-else>
				<img class="w-full mb-5" :src="featured_image" :alt="title" >
				<h1 class="mb-5">{{ title }}</h1>
				<div class="mb-8 article-body" v-html="body"></div>
				Tags: <span v-for="tag in tags" class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">{{ tag }}</span>
			</div>
		</article>
	</div>
</template>

<script>
	import axios from 'axios';

	export default {
		data() {
			return {
				title: '',
				body: '',
				featured_image: '',
				tags: [],
				loading: true
			}
		},

		mounted() {
            axios.get('/api/articles/' + this.$route.params.slug)
            .then(res => {
            	const article = res.data;
            	this.title = article.title;
            	this.body = article.body;
            	this.featured_image = article.featured_image;
            	this.tags = article.tags;
                this.loading = false;
            });
        }
	}
</script>
