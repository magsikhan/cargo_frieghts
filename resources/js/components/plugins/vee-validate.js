import Vue from 'vue';
import { ValidationProvider, extend, ValidationObserver } from 'vee-validate';
import {email,required} from 'vee-validate/dist/rules';
Vue.use(ValidationProvider,ValidationObserver,extend)

extend ('required', {
    ...required,
    message: 'This field is required'
});

extend ('email', {
    ...email,
    message: 'This field is required valid email'
});