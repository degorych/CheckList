
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/draggable.js';
import 'jquery-ui/ui/widgets/sortable.js';

const addItem = $('#item-add');
const items = $('#items');
const itemsCounter = $('#counter');

let counter = 1;

items.sortable();

addItem.on('click', function (e) {
    e.preventDefault();
    const newCard = $("<div>", {"class": "card"});
    const newCardBody = $("<div>", {"class": "card-body"});

    newCardBody.append($('<input>', {'type': 'text', 'class': 'form-control-plaintext', 'name': `item-title[${counter}]`, 'placeholder': 'my title'}));
    newCardBody.append($('<input>', {'type': 'text', 'class': 'form-control-plaintext', 'name': `item-description[${counter}]`, 'placeholder': 'my description'}));
    newCardBody.append($('<input>', {'type': 'hidden', 'name': `item-order[${counter}]`, 'value': counter}));

    newCardBody.appendTo(newCard);
    newCard.appendTo(items);
    counter++;
    itemsCounter.val(counter);
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
