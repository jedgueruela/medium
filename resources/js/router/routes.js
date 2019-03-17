import Homepage from '../pages/index.vue';
import Article from '../pages/article.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: Homepage
    },
    {
        name: 'article',
        path: '/article/:slug',
        component: Article,
        props: true 
    },
];

export default routes;
