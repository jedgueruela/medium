<template>
	<div>
		<vue-progress-bar></vue-progress-bar>
		<Header :title="title" />
		<main role="main">
            <transition name="page" mode="out-in">
                <router-view></router-view>
            </transition>
        </main>
		<Footer />
	</div>
</template>

<script>
	import Header from './components/header.vue';
    import Footer from './components/footer.vue';

	export default {
		data() {
			return {
				title: 'Medium'
			}
		},

		components: {
			Header, Footer
		},

		mounted: async function () {
            this.$Progress.finish();
        },

        created () {    
            this.$Progress.start();
        
            this.$router.beforeEach((to, from, next) => {
                if (to.meta.progress !== undefined) {
                    let meta = to.meta.progress;
                    this.$Progress.parseMeta(meta);
                }
            
                this.$Progress.start();
                next();
            });
            
            this.$router.afterEach((to, from) => {
                this.$Progress.finish();
            });
        }
	}
</script>