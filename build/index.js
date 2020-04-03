/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_5__);





 //import { withState } from '@wordpress/compose';
//import { setState } from '@wordpress/compose';

var _wp$compose = wp.compose,
    withState = _wp$compose.withState,
    setState = _wp$compose.setState;
var _wp$editor = wp.editor,
    RichText = _wp$editor.RichText,
    AlignmentToolbar = _wp$editor.AlignmentToolbar,
    BlockControls = _wp$editor.BlockControls,
    BlockAlignmentToolbar = _wp$editor.BlockAlignmentToolbar,
    InspectorControls = _wp$editor.InspectorControls,
    InnerBlocks = _wp$editor.InnerBlocks,
    withColors = _wp$editor.withColors,
    PanelColorSettings = _wp$editor.PanelColorSettings,
    getColorClassName = _wp$editor.getColorClassName;
var _wp$components = wp.components,
    Toolbar = _wp$components.Toolbar,
    Button = _wp$components.Button,
    Tooltip = _wp$components.Tooltip,
    PanelBody = _wp$components.PanelBody,
    PanelRow = _wp$components.PanelRow,
    FormToggle = _wp$components.FormToggle,
    ToggleControl = _wp$components.ToggleControl,
    Disabled = _wp$components.Disabled;
var inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, {
  key: "inspector"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
  title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Business Directory Display Options')
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["SelectControl"], {
  label: "Format",
  value: _wordpress_date__WEBPACK_IMPORTED_MODULE_5__["format"],
  options: formatOptions,
  onChange: function onChange(value) {
    return setAttributes({
      format: value
    });
  }
  /*onChange={ (nextValue) => {
      props.setAttributes({
          format: nextValue
      });
  }}*/

}))));
var formatOptions = [{
  label: 'List',
  value: 'list'
}, {
  label: 'Grid 2',
  value: 'grid2'
}, {
  label: 'Grid 3',
  value: 'grid3'
}, {
  label: 'Grid 4',
  value: 'grid4'
}, {
  label: 'Responsive',
  value: 'responsive'
}];
var textOptions = [{
  label: 'Excerpt',
  value: 'excerpt'
}, {
  label: 'Description',
  value: 'description'
}, {
  label: 'None',
  value: 'none'
}];
var orderbyOptions = [{
  label: 'Title',
  value: 'title'
}, {
  label: 'Date',
  value: 'date'
}, {
  label: 'Menu Order',
  value: 'menu_order'
}, {
  label: 'Random',
  value: 'random'
}, {
  label: 'Membership Level',
  value: 'membership_level'
}];
var orderOptions = [{
  label: 'Ascending',
  value: 'asc'
}, {
  label: 'Descending',
  value: 'desc'
}];
var imageOptions = [{
  label: 'Logo',
  value: 'logo'
}, {
  label: 'Featured Image',
  value: 'featured'
}, {
  label: 'None',
  value: 'none'
}];
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('cdash-bd-blocks/business-directory', {
  title: 'Display Business Directory',
  icon: 'admin-home',
  category: 'cd-blocks',
  attributes: {
    format: {
      type: 'string',
      default: 'list'
    },
    category: {
      type: 'string',
      default: ''
    },
    tags: {
      type: 'string',
      default: ''
    },
    level: {
      type: 'string',
      default: ''
    },
    text: {
      type: 'string',
      default: 'excerpt'
    },
    single_link: {
      type: 'string',
      default: 'yes'
    },
    perpage: {
      type: 'number',
      default: -1
    },
    orderby: {
      type: 'string',
      default: 'title'
    },
    order: {
      type: 'string',
      default: 'asc'
    },
    image: {
      type: 'string',
      default: 'logo'
    },
    status: {
      type: 'string',
      default: ''
    },
    image_size: {
      type: 'number',
      default: ''
    },
    alpha: {
      type: 'string',
      default: 'no'
    },
    logo_gallery: {
      type: 'string',
      default: 'no'
    },
    show_category_filter: {
      type: 'string',
      default: 'no'
    }
  },
  edit: function edit(props) {
    var _props$attributes = props.attributes,
        format = _props$attributes.format,
        category = _props$attributes.category,
        tags = _props$attributes.tags,
        level = _props$attributes.level,
        text = _props$attributes.text,
        single_link = _props$attributes.single_link,
        perpage = _props$attributes.perpage,
        orderby = _props$attributes.orderby,
        order = _props$attributes.order,
        image = _props$attributes.image,
        status = _props$attributes.status,
        image_size = _props$attributes.image_size,
        alpha = _props$attributes.alpha,
        logo_gallery = _props$attributes.logo_gallery,
        show_category_filter = _props$attributes.show_category_filter,
        className = props.className;
    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: props.className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3___default.a, {
      block: "cdash-bd-blocks/business-directory",
      attributes: props.attributes
    }), inspectorControls, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "businesslist"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "bus_directory"
    }, "CD Business Directory", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Format: ", format))))];
  },
  save: function save() {
    // Rendering in PHP
    return null;
  }
});

/***/ }),

/***/ "@wordpress/blocks":
/*!*****************************************!*\
  !*** external {"this":["wp","blocks"]} ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["blocks"]; }());

/***/ }),

/***/ "@wordpress/components":
/*!*********************************************!*\
  !*** external {"this":["wp","components"]} ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/date":
/*!***************************************!*\
  !*** external {"this":["wp","date"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["date"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!******************************************!*\
  !*** external {"this":["wp","element"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!***************************************!*\
  !*** external {"this":["wp","i18n"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["i18n"]; }());

/***/ }),

/***/ "@wordpress/server-side-render":
/*!***************************************************!*\
  !*** external {"this":["wp","serverSideRender"]} ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["serverSideRender"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map