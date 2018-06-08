require('../css/app.scss');

// assets/js/app.js
import Vue from 'vue';
import Example from './components/Example'
 
/**
* Create a fresh Vue Application instance
*/
var app = new Vue({
  el: '#app',
  components: {Example}, 
  delimiters: ['${','}'],
  data: {
  	message: 'Welcome to this vue.js side !'
  }, 
  methods: {
  	reverseMessage: function() {
  		this.message = this.message.split('').reverse().join('')
  	}
  }
});


/** Inject Data **/
Vue.component('todo-item', {
  props: ['todo'],
  delimiters: ['${','}'],
  template: '<li>${ todo.text }</li>'
})

var app7 = new Vue({
  el: '#app-7',
  data: {
    frontList: [
      { id: 0, text: 'Vue.js' },
      { id: 1, text: 'Angular.js' },
      { id: 2, text: 'React / React Native' }
    ],
    backList: [
      { id: 0, text: 'Symfony.js' },
      { id: 1, text: 'Laravel.js' },
      { id: 2, text: 'Ruby on Rails' }
    ],
    toolsList: [
      { id: 0, text: 'Code Pen' },
      { id: 1, text: 'Evernote' },
      { id: 2, text: 'Slack' }
    ],
    ideList: [
      { id: 0, text: 'Atom' },
      { id: 1, text: 'PhpStorm' },
      { id: 2, text: 'Sublime text' }
    ]
  }
})

var app1 = new Vue ({
	el: '#app-1'
})



// import App from './App'

// new Vue({
//   el: '#app',
//   template: '<App/>',
//   components: { App }
// })

