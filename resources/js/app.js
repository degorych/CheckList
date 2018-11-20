
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Sortable from 'sortablejs/Sortable.js'
window.Sortable = Sortable;

const addItem = document.getElementById('item-add');
const items = document.getElementById('items');
const itemsCounter = document.getElementById('counter');

let counter = 1;

/*
<div class="card-body item-card">
    <div class="row">
        <div class="form-check checkbox-ver-mar">
            <input type="checkbox">
        </div>
        <div class="col">
            <input type="text" class="form-control-plaintext form-control-lg" name="item-title[0]" placeholder="my title" value="">
            <input type="text" class="form-control-plaintext" name="item-description[0]" placeholder="my description" value="">
            <input type="hidden" name="item-order[0]" value="0">
        </div>
    </div>
</div>
* */

addItem.addEventListener('click', function (e) {
    e.preventDefault();

    const newCard = document.createElement('div');
    newCard.className = 'card';

    const newCardBody = document.createElement('div');
    newCardBody.className = 'card-body item-card';

    const newRow = document.createElement('div');
    newRow.className = 'row';

    const newCheckboxContainer = document.createElement('div');
    newCheckboxContainer.className = 'form-check checkbox-ver-mar';

    const newCheckbox = document.createElement('input');
    newCheckbox.setAttribute('type', 'checkbox');

    newCheckboxContainer.appendChild(newCheckbox);
    newRow.appendChild(newCheckboxContainer);

    const newInputContainer = document.createElement('div');
    newInputContainer.className = 'col';

    const inputSettings = [
        {
            type: 'text',
            class: 'form-control-plaintext form-control-lg',
            name: `item-title[${counter}]`,
            placeholder: 'Title'
        },
        {
            type: 'text',
            class: 'form-control-plaintext',
            name: `item-description[${counter}]`,
            placeholder: 'Description'
        },
        {
            type: 'hidden',
            name: `item-order[${counter}]`,
            value: counter
        }
    ];

    inputSettings.forEach(function (input) {
        const newElem = document.createElement('input');
        for (let key in input) {
            newElem.setAttribute(key, input[key]);
        }

        newInputContainer.appendChild(newElem);
    });

    newRow.appendChild(newInputContainer);
    newCardBody.appendChild(newRow);
    newCard.appendChild(newCardBody);
    items.appendChild(newCard);
    counter++;
    itemsCounter.setAttribute('value', counter.toString());
});

const sortable = Sortable.create(items, {
    animation: 300,
    onEnd: function (evt) {
        let min = evt.oldIndex;  // element's old index within old parent
        let max = evt.newIndex;  // element's new index within new parent

        if (max < min) {
            [max, min] = [min, max];
        }

        let list = items.querySelectorAll('input[type="hidden"]');

        list = [...list].filter(function(input) {
            const value = input.getAttribute('value');
            return value >= min && value <= max;
        });

        list.forEach( function(element) {
            element.setAttribute('value', min);
            min++;
        });
    },
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
