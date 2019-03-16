<template>
	<footer class="text-center p-6 border-t-1 border-grey-lighter" role="contentinfo">
		&copy; {{ yearNow }}
	</footer>
</template>

<script>
	export default {
		data() {
			return {
				yearNow: (new Date()).getFullYear()
			}
		}
	}
</script>
