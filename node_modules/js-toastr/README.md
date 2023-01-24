# js-toastr

A lightweight javascript toast library with no dependencies and 1 KB Size.

[Demo](https://rabhinav77.github.io/js-toastr/) 


# Install
```

# You can install js-toastr with npm
$ npm install --save js-toastr
 
# Alternatively you can use Yarn
$ yarn add js-toastr

```

# CSS
```
//Copy or import css from toast.css or add through CDN Link

https://cdn.jsdelivr.net/npm/js-toastr@1.1.1/toast.css

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/js-toastr@1.1.1/toast.css">

```

# JS
```

// using ES6 modules

import toastr from 'js-toastr';
 
// using CommonJS modules

var toastr = require('js-toastr');

// CDN Link

https://cdn.jsdelivr.net/npm/js-toastr@1.1.1/toast.min.js

<script src="https://cdn.jsdelivr.net/npm/js-toastr@1.1.1/toast.min.js"></script>

```


# Set Message Postion (Optional)

```
toastr.setPosition('top-right');

Position Options - 

1. top-center
2. bottom-center
3. top-left
4. bottom-left
5. top-right
6. bottom-right

// Default Position if not set ==> top-right

```

# Usage

```
// toastr.message(YOUR_MESSAGE, STATE, TIME_IN_Millisecond);

Example :

toastr.message('Welocome to tiny toast library', 'success', 3000);

toastr.message('Welocome to tiny toast library', 'error', 3000);

toastr.message('Welocome to tiny toast library', 'info', 3000);

toastr.message('Welocome to tiny toast library', 'warning', 3000);

```

# License

[MIT](https://github.com/rabhinav77/js-toastr/blob/master/LICENSE)