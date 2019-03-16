<template>
	<div>
		<div class="flex justify-center my-8">
			<div class="w-1/2">
				<div v-for="(article, index) in list" :key="index" class="max-w-md w-full lg:flex mb-8">
					<div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
					</div>
					<div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
						<div class="mb-8">
							<div class="text-black font-bold text-xl mb-2">Can coffee make you a better developer?</div>
							<p class="text-grey-darker text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
						</div>
						<div class="flex items-center">
							<span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#photography</span>
							<span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#travel</span>
							<span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#winter</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<infinite-loading @infinite="infiniteHandler"></infinite-loading>
	</div>
</template>

<script>
	import axios from 'axios';
	import InfiniteLoading from "vue-infinite-loading";

	const api = '/api/articles';

	export default {
		data() {
			return {
				page: 1,
				list: [],
			};
		},

		components: {
			InfiniteLoading,
		},

		methods: {
			infiniteHandler($state) {
				axios.get(api, {
					params: {
						page: this.page,
					},
				}).then(({ data }) => {
					if (data.hits.length) {
						this.page += 1;
						this.list.push(...data.hits);
						$state.loaded();
					} else {
						$state.complete();
					}
				});
			},
		},
	};
</script>
