<template>
	<header role="banner">
		<div class="text-center bg-teal p-6">
			<div class="container mx-auto">
				<h1 class="mb-4 text-white">{{ title }}</h1>
				<router-link to="/">
					<span class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">Home</span>
				</router-link>
				<a href="/articles" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white">Backend</a>
			</div>
		</div>
	</header>
</template>

<script>
    export default {
        props: ['title']
    }
</script>
