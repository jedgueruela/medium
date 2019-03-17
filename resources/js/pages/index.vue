<template>
	<div>
		<div class="flex justify-center my-8">
			<div class="w-1/2">
				<article v-for="(article, index) in articles" :key="index" class="max-w-sm mx-auto rounded overflow-hidden shadow-lg mb-8">
					<router-link :to="{ name: 'article', params: { slug: article.slug } }">
    					<img class="w-full" :src="article.thumbnail_image" :alt="article.title">
    				</router-link>
				  	<div class="px-6 py-4">
				    	<div class="font-bold text-xl mb-2">{{ article.title }}</div>
					    <p class="text-grey-darker text-base">{{ article.excerpt }}</p>
				  	</div>
				  	<div class="px-6 py-4">
				  		Tags: 
				    	<span v-for="tag in article.tags" class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">{{ tag }}</span>
				  	</div>
				</article>
			</div>
		</div>
		<infinite-loading @infinite="infiniteHandler"></infinite-loading>
	</div>
</template>

<script>
	import axios from 'axios';
	import InfiniteLoading from "vue-infinite-loading";

	export default {
		data() {
			return {
				page: 1,
				articles: [],
			};
		},

		components: {
			InfiniteLoading,
		},

		methods: {
			infiniteHandler($state) {
				axios.get('/api/articles', {
					params: {
						page: this.page,
					},
				}).then(collection => {
					console.log(collection)
					if (collection.data.length) {
						this.page += 1;
						this.articles.push(...collection.data);
						$state.loaded();
					} else {
						$state.complete();
					}
				});
			},
		},
	};
</script>
