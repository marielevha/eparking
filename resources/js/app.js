import { createApp, h } from 'vue';
import { InertiaProgress } from '@inertiajs/progress';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import i18n from "./i18n/index.js";
import VueFeather from 'vue-feather';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import VModal from 'vue-js-modal';
//import VueFormWizard from 'vue-form-wizard';
//import 'vue-form-wizard/dist/vue-form-wizard.min.css';


InertiaProgress.init()

const global_data  = {
    data() {
        return {
            config,
        }
    },
    methods: {
        getFormData: function(object) {
            const formData = new FormData();
            Object.keys(object).forEach(key => formData.append(key, object[key]));
            return formData;
        },
        bytesToSize: function (bytes) {
            let sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        },
        isPermit: function (permission, permissions) {
            for (let i = 0; i < permissions.length; i++) {
                if (permissions[i].name === permission) {
                    return true;
                }
            }
            return false;
        }
    }
}

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  title: title => title ? `${title} - E-Parking` : 'E-Parking',
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
        .mixin(global_data)
        .use(plugin)
        .use(i18n)
        .use(VueAxios, axios)
        .use(VueLoading)
        //.use(VueFormWizard)
        //.use(VModal)
        .component(VueFeather.name, VueFeather)
        .mount(el)
  },
})
