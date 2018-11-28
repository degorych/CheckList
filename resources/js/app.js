/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Sortable from 'sortablejs/Sortable.js'

window.Sortable = Sortable;

/**
 * User script
 */
const addItem = document.getElementById('item-add');
const items = document.getElementById('items');
const itemsCounter = document.getElementById('counter');
const colorSelector = document.getElementById('color-selector');
const colorController = document.getElementById('check-list-color');

let counter = 1;

/**
 * Create color menu
 */
(function () {
    if (!colorSelector) {
        return;
    }

    const colorScheme = [
        '#F8F9FA', // default
        '#FFFFFF', // white
        '#ffb5b2', // red
        '#FFF8AF', // yellow
        '#C2FF9C', // green
        '#B9E7FF', // blue
        '#d0c2ff', // violet
        '#FFC7DA' // ping
    ];

    for (const scheme of colorScheme) {
        const newColor = document.createElement('span');
        newColor.style.backgroundColor = scheme;

        colorSelector.appendChild(newColor);
    }

    colorSelector.addEventListener('click', function (e) {
        const selectedColor = e.target.style.backgroundColor;
        colorController.setAttribute('value', rgbToHex(selectedColor));
        document.body.style.backgroundColor = selectedColor;
    });
})();

function rgbToHex(rgb) {
    const rgbValues = /rgb\((\d+),\s*(\d+),\s*(\d+)\)/i.exec(rgb);
    let hex = '#';
    for (let i = 1; i < 4; i++) {
        hex += parseInt(rgbValues[i], 10).toString(16).padStart(2, '0');
    }
    return hex;
}

/**
 * Add new item
 */
addItem.addEventListener('click', function (e) {
    e.preventDefault();

    const newCard = document.createElement('div');
    newCard.className = 'card';

    const newCardBody = document.createElement('div');
    newCardBody.className = 'card-body item-card';

    const newRow = document.createElement('div');
    newRow.className = 'row';

    const newCheckboxContainer = document.createElement('label');
    newCheckboxContainer.className = 'col item-container';

    const inputSettings = [
        {
            type: 'checkbox',
            name: `item-is-done[${counter}]`
        },
        {
            type: 'text',
            class: 'form-control-plaintext form-control-lg item-title checkmark',
            name: `item-title[${counter}]`,
            placeholder: 'Enter title'
        },
        {
            type: 'text',
            class: 'form-control-plaintext item-description',
            name: `item-description[${counter}]`,
            placeholder: 'Enter description'
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

        newCheckboxContainer.appendChild(newElem);
    });

    const newCheckmark = document.createElement('span');
    newCheckmark.className = 'checkmark';

    newCheckboxContainer.insertBefore(newCheckmark, newCheckboxContainer.children[1]);

    newRow.appendChild(newCheckboxContainer);
    newCardBody.appendChild(newRow);
    newCard.appendChild(newCardBody);
    items.appendChild(newCard);
    counter++;
    itemsCounter.setAttribute('value', counter.toString());
});

/**
 * Make items sortable, change items
 * @type {items}
 */
const sortable = Sortable.create(items, {
    animation: 300,
    onEnd: function (evt) {
        let min = evt.oldIndex;  // element's old index within old parent
        let max = evt.newIndex;  // element's new index within new parent

        if (max < min) {
            [max, min] = [min, max];
        }

        let list = items.querySelectorAll('input[type="hidden"]');

        list = [...list].filter(function (input) {
            const value = input.getAttribute('value');
            return value >= min && value <= max;
        });

        list.forEach(function (element) {
            element.setAttribute('value', min);
            min++;
        });
    },
});
