import Home from './pages/Home'
import Dashboard from './pages/Dashboard'
import Projects from './pages/Projects'
import Notfound from './pages/Notfound'
import Team from './pages/Team'


export default {

    mode: 'history',

    routes: [

        {
            path: '*',
            component: Notfound
        },

        {
            path: '/dashboard',
            component: Dashboard,
            name: 'Dashboard',
            // beforeEnter: (to, form, next) => {
            //     axios.get('/api/authenticated').then(() => {
            //         next()
            //     }).catch(() => {
            //         return next({ name: 'Login' })
            //     })
            // }

        },


        {
            path: '/',
            component: Home
        },

        {
            path: '/team',
            component: Team,
            name: 'Team',
            // beforeEnter: (to, form, next) => {
            //     axios.get('/api/authenticated').then(() => {
            //         next()
            //     }).catch(() => {
            //         return next({ name: 'Login' })
            //     })
            // }
        },

        {
            path: '/projects',
            component: Projects,
            name: 'Projects',
            // beforeEnter: (to, form, next) => {
            //     axios.get('/api/authenticated').then(() => {
            //         next()
            //     }).catch(() => {
            //         return next({ name: 'Login' })
            //     })
            // }
        }
    ]
}