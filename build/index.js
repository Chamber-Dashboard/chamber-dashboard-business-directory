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

/***/ "./src/business_category_block/edit.js":
/*!*********************************************!*\
  !*** ./src/business_category_block/edit.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);






var withState = wp.compose.withState;
var formatOptions = [{
  label: 'List',
  value: 'list'
}, {
  label: 'Grid',
  value: 'grid'
}];
var orderbyOptions = [{
  label: 'Title',
  value: 'name'
}, {
  label: 'Count',
  value: 'count'
}];
var orderOptions = [{
  label: 'Ascending',
  value: 'ASC'
}, {
  label: 'Descending',
  value: 'DESC'
}];
var childOfOptions = [{
  label: 'Select a parent category',
  value: 0
}];
wp.apiFetch({
  path: "/wp/v2/business_category?per_page=100"
}).then(function (posts) {
  jQuery.each(posts, function (key, val) {
    childOfOptions.push({
      label: val.name,
      value: val.id
    });
  });
}).catch();
var excludeCatOptions = [{
  label: 'Select one or more categories',
  value: 0
}];
wp.apiFetch({
  path: "/wp/v2/business_category?per_page=100"
}).then(function (posts) {
  jQuery.each(posts, function (key, val) {
    excludeCatOptions.push({
      label: val.name,
      value: val.id
    });
  });
}).catch();

var edit = function edit(props) {
  var _props$attributes = props.attributes,
      align = _props$attributes.align,
      cd_block = _props$attributes.cd_block,
      format = _props$attributes.format,
      orderby = _props$attributes.orderby,
      order = _props$attributes.order,
      showcount = _props$attributes.showcount,
      showCountToggle = _props$attributes.showCountToggle,
      hierarchical = _props$attributes.hierarchical,
      hierarchyToggle = _props$attributes.hierarchyToggle,
      hide_empty = _props$attributes.hide_empty,
      hideEmptyToggle = _props$attributes.hideEmptyToggle,
      child_of = _props$attributes.child_of,
      exclude = _props$attributes.exclude,
      excludeCategories = _props$attributes.excludeCategories,
      depth = _props$attributes.depth,
      className = props.className,
      setAttributes = props.setAttributes;

  var setShowCount = function setShowCount(showCountToggle) {
    props.setAttributes({
      showCountToggle: showCountToggle
    });
    !!showCountToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      showcount: 1
    })) : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      showcount: 0
    }));
  };

  var setHierarchy = function setHierarchy(hierarchyToggle) {
    props.setAttributes({
      hierarchyToggle: hierarchyToggle
    });
    !!hierarchyToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      hierarchical: 1
    })) : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      hierarchical: 0
    }));
  };

  var setHideEmpty = function setHideEmpty(hideEmptyToggle) {
    props.setAttributes({
      hideEmptyToggle: hideEmptyToggle
    });
    !!hideEmptyToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      hide_empty: 1
    })) : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      hide_empty: 0
    }));
  };

  var setCategories = function setCategories(excludeCategories) {
    props.setAttributes({
      excludeCategories: excludeCategories
    });
  };

  var inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["InspectorControls"], {
    key: "inspector"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Business Category Block Options')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Layout Options'),
    value: format,
    options: formatOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        format: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Order By'),
    value: orderby,
    options: orderbyOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        orderby: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Order'),
    value: order,
    options: orderOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        order: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show child categories'),
    value: child_of,
    options: childOfOptions,
    help: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Displays only the child categories of the selected parent category.'),
    onChange: function onChange(nextValue) {
      return setAttributes({
        child_of: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
    className: "cdash_multi_select",
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Exclude Categories'),
    value: excludeCategories,
    options: excludeCatOptions,
    onChange: setCategories
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show the number of businesses in each category'),
    checked: showCountToggle,
    onChange: setShowCount
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show the categories in hierarchical order'),
    checked: hierarchyToggle,
    onChange: setHierarchy
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Hide Empty Categories'),
    checked: hideEmptyToggle,
    onChange: setHideEmpty
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["RangeControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Number of child category levels to show'),
    min: 0,
    max: 5,
    value: depth,
    onChange: function onChange(value) {
      return setAttributes({
        depth: value
      });
    },
    initialPosition: 0 //allowReset = { true }
    //resetFallbackValue = { -1 }

  }))));
  return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: props.className
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1___default.a, {
    block: "cdash-bd-blocks/business-category",
    attributes: props.attributes
  }), inspectorControls, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "bus_cat"
  }))];
};

/* harmony default export */ __webpack_exports__["default"] = (edit);

/***/ }),

/***/ "./src/business_category_block/index.js":
/*!**********************************************!*\
  !*** ./src/business_category_block/index.js ***!
  \**********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/business_category_block/edit.js");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/**
 * Block dependencies
 */





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('cdash-bd-blocks/business-category', {
  title: 'Display Business Categories',
  icon: 'category',
  category: 'cd-blocks',
  description: 'The business category block displays the categories on your page.',
  example: {},
  supports: {
    // Declare support for block's alignment.
    // This adds support for all the options:
    // left, center, right, wide, and full.
    align: true
  },
  attributes: {
    align: {
      type: 'string',
      default: ''
    },
    cd_block: {
      type: 'string',
      default: 'yes'
    },
    format: {
      type: 'string',
      default: 'list'
    },
    orderby: {
      type: 'string',
      default: 'name'
    },
    order: {
      type: 'string',
      default: 'ASC'
    },
    showcount: {
      type: 'number',
      default: 0
    },
    showCountToggle: {
      type: 'boolean',
      default: false
    },
    hierarchical: {
      type: 'number',
      default: 1
    },
    hierarchyToggle: {
      type: 'boolean',
      default: true
    },
    hide_empty: {
      type: 'number',
      default: 1
    },
    hideEmptyToggle: {
      type: 'boolean',
      default: true
    },
    child_of: {
      type: 'number',
      default: 0
    },
    exclude: {
      type: 'number',
      default: 0
    },
    excludeCategories: {
      type: 'array',
      default: []
    },
    depth: {
      type: 'number',
      default: 0
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save() {
    // Rendering in PHP
    return null;
  }
});

/***/ }),

/***/ "./src/business_directory_block/edit.js":
/*!**********************************************!*\
  !*** ./src/business_directory_block/edit.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_6__);







var formatOptions = [{
  label: 'List',
  value: 'list'
}, {
  label: '2 Columns',
  value: 'grid2'
}, {
  label: '3 Columns',
  value: 'grid3'
}, {
  label: '4 Columns',
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
  value: 'rand'
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
var imageSizeOptions = [{
  label: 'Auto',
  value: ''
}, {
  label: 'Small',
  value: 'thumbnail'
}, {
  label: 'Medium',
  value: 'medium'
}, {
  label: 'Large',
  value: 'large'
}, {
  label: 'Full Width',
  value: 'full'
}];
var categoryOptions = [{
  label: 'Select one or more categories',
  value: null
}];
var borderStyleOptions = [{
  label: 'Solid',
  value: 'solid'
}, {
  label: 'Dotted',
  value: 'dotted'
}, {
  label: 'Dashed',
  value: 'dashed'
}, {
  label: 'Double',
  value: 'double'
}];
wp.apiFetch({
  path: "/wp/v2/business_category?per_page=100"
}).then(function (posts) {
  jQuery.each(posts, function (key, val) {
    categoryOptions.push({
      label: val.name,
      value: val.slug
    });
  });
}).catch();
var membershipLevelOptions = [{
  label: 'Select one or more Membersihp Levels',
  value: null
}];
var membershipStatusOptions = [//{ label: 'Select a Membership Status', value: null }
];
var fetchUrlAction = wpAjax.wpurl + '/wp-admin/admin-ajax.php?action=cdash_check_mm_active_action';
wp.apiFetch({
  url: fetchUrlAction
}).then(function (response) {
  if (response.cdash_mm_active) {
    wp.apiFetch({
      path: "/wp/v2/membership_status?per_page=100"
    }).then(function (posts) {
      jQuery.each(posts, function (key, val) {
        membershipStatusOptions.push({
          label: val.name,
          value: val.slug
        });
      });
    });
  }
});
var titleFontSizes = [{
  name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Small'),
  slug: 'small',
  size: 12
}, {
  name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Medium'),
  slug: 'medium',
  size: 18
}, {
  name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Big'),
  slug: 'big',
  size: 26
}];
var titleFallbackFontSize = 16;
var borderRadiusUnitOptions = [{
  label: 'px',
  value: 'px'
}, {
  label: '%',
  value: '%'
}];
wp.apiFetch({
  path: "/wp/v2/membership_level?per_page=100"
}).then(function (posts) {
  jQuery.each(posts, function (key, val) {
    membershipLevelOptions.push({
      label: val.name,
      value: val.slug
    });
  });
});

var edit = function edit(props) {
  var _props$attributes = props.attributes,
      align = _props$attributes.align,
      textAlignment = _props$attributes.textAlignment,
      cd_block = _props$attributes.cd_block,
      postLayout = _props$attributes.postLayout,
      format = _props$attributes.format,
      categoryArray = _props$attributes.categoryArray,
      category = _props$attributes.category,
      tags = _props$attributes.tags,
      membershipLevelArray = _props$attributes.membershipLevelArray,
      level = _props$attributes.level,
      displayPostContent = _props$attributes.displayPostContent,
      display = _props$attributes.display,
      text = _props$attributes.text,
      singleLinkToggle = _props$attributes.singleLinkToggle,
      single_link = _props$attributes.single_link,
      perpage = _props$attributes.perpage,
      orderby = _props$attributes.orderby,
      order = _props$attributes.order,
      image = _props$attributes.image,
      membershipStatusArray = _props$attributes.membershipStatusArray,
      status = _props$attributes.status,
      image_size = _props$attributes.image_size,
      alphaToggle = _props$attributes.alphaToggle,
      alpha = _props$attributes.alpha,
      logo_gallery = _props$attributes.logo_gallery,
      categoryFilterToggle = _props$attributes.categoryFilterToggle,
      show_category_filter = _props$attributes.show_category_filter,
      displayAddressToggle = _props$attributes.displayAddressToggle,
      displayUrlToggle = _props$attributes.displayUrlToggle,
      displayPhoneToggle = _props$attributes.displayPhoneToggle,
      displayEmailToggle = _props$attributes.displayEmailToggle,
      displayCategoryToggle = _props$attributes.displayCategoryToggle,
      displayTagsToggle = _props$attributes.displayTagsToggle,
      displayLevelToggle = _props$attributes.displayLevelToggle,
      displaySocialMediaIconsToggle = _props$attributes.displaySocialMediaIconsToggle,
      displayLocationNameToggle = _props$attributes.displayLocationNameToggle,
      displayHoursToggle = _props$attributes.displayHoursToggle,
      changeTitleFontSize = _props$attributes.changeTitleFontSize,
      titleFontSize = _props$attributes.titleFontSize,
      disablePagination = _props$attributes.disablePagination,
      displayImageOnTop = _props$attributes.displayImageOnTop,
      enableBorder = _props$attributes.enableBorder,
      borderColor = _props$attributes.borderColor,
      borderThickness = _props$attributes.borderThickness,
      borderStyle = _props$attributes.borderStyle,
      borderRadius = _props$attributes.borderRadius,
      borderRadiusUnits = _props$attributes.borderRadiusUnits,
      className = props.className,
      setAttributes = props.setAttributes;

  var setDirectoryLayout = function setDirectoryLayout(format) {
    props.setAttributes({
      format: format
    });
  };

  var setCategories = function setCategories(categoryArray) {
    props.setAttributes({
      categoryArray: categoryArray
    });
  };

  var setMembershipLevel = function setMembershipLevel(membershipLevelArray) {
    props.setAttributes({
      membershipLevelArray: membershipLevelArray
    });
  };

  var setMembershipStatus = function setMembershipStatus(membershipStatusArray) {
    props.setAttributes({
      membershipStatusArray: membershipStatusArray
    });
  };

  var setSingleLink = function setSingleLink(singleLinkToggle) {
    props.setAttributes({
      singleLinkToggle: singleLinkToggle
    });
    !!singleLinkToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      single_link: 'yes'
    })) : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      single_link: 'no'
    }));
  };

  var setAlpha = function setAlpha(alphaToggle) {
    props.setAttributes({
      alphaToggle: alphaToggle
    });
    !!alphaToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      alpha: 'yes'
    })) : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      alpha: 'no'
    }));
  };

  var setShowCategoryFilter = function setShowCategoryFilter(categoryFilterToggle) {
    props.setAttributes({
      categoryFilterToggle: categoryFilterToggle
    });
    !!categoryFilterToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      show_category_filter: 'yes'
    })) : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      show_category_filter: 'no'
    }));
  };

  var inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["InspectorControls"], {
    key: "inspector"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Formatting Options')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Directory Layout",
    value: format,
    options: formatOptions,
    onChange: setDirectoryLayout
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["RangeControl"], {
    label: "Number of Businesses per page",
    min: -1,
    max: 50,
    onChange: function onChange(value) {
      return setAttributes({
        perpage: value
      });
    },
    value: perpage,
    initialPosition: -1,
    allowReset: "true"
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Disable Pagination'),
    checked: disablePagination //onChange = {setDisplayAddressToggle}
    ,
    onChange: function onChange(nextValue) {
      return setAttributes({
        disablePagination: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Title below the Image'),
    checked: displayImageOnTop,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayImageOnTop: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Enable Custom Title Font size'),
    checked: changeTitleFontSize //onChange = {setDisplayAddressToggle}
    ,
    onChange: function onChange(nextValue) {
      return setAttributes({
        changeTitleFontSize: nextValue
      });
    }
  })), changeTitleFontSize && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["FontSizePicker"], {
    fontSizes: titleFontSizes,
    value: titleFontSize,
    fallbackFontSize: titleFallbackFontSize,
    withSlider: "true",
    onChange: function onChange(nextValue) {
      return setAttributes({
        titleFontSize: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Enable Border Styles'),
    checked: enableBorder,
    onChange: function onChange(nextValue) {
      return setAttributes({
        enableBorder: nextValue
      });
    }
  })), enableBorder &&
  /*<ColorPalette
      colors={ colors }
      value={ borderColor }
      onChange={ ( color ) => setState( { color } ) }
  />*/

  /*<ColorPicker
      label="Border Color"
      color={ borderColor }
      onChangeComplete={ ( value ) => setState( value.hex ) }
  />*/
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["PanelColorSettings"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Color Settings'),
    colorSettings: [{
      value: borderColor,
      onChange: function onChange(colorValue) {
        return setAttributes({
          borderColor: colorValue
        });
      },
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Border Color')
    }]
  }), enableBorder && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["RangeControl"], {
    label: "Border Thickness",
    min: 1,
    max: 10,
    onChange: function onChange(value) {
      return setAttributes({
        borderThickness: value
      });
    },
    value: borderThickness,
    initialPosition: 1,
    allowReset: "true"
  })), enableBorder && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Border Style",
    value: borderStyle,
    options: borderStyleOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        borderStyle: nextValue
      });
    }
  }), enableBorder && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["RangeControl"], {
    label: "Border Radius",
    min: 0,
    max: 100,
    onChange: function onChange(value) {
      return setAttributes({
        borderRadius: value
      });
    },
    value: borderRadius,
    initialPosition: 0,
    allowReset: "true"
  })), enableBorder && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Border Radius Units",
    value: borderRadiusUnits,
    options: borderRadiusUnitOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        borderRadiusUnits: nextValue
      });
    }
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Order By",
    value: orderby,
    options: orderbyOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        orderby: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Order",
    value: order,
    options: orderOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        order: nextValue
      });
    }
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Options'),
    initialOpen: false
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Address'),
    checked: displayAddressToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayAddressToggle: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Url'),
    checked: displayUrlToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayUrlToggle: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Phone'),
    checked: displayPhoneToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayPhoneToggle: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Email'),
    checked: displayEmailToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayEmailToggle: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Location Name'),
    checked: displayLocationNameToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayLocationNameToggle: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Categories'),
    checked: displayCategoryToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayCategoryToggle: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Tags'),
    checked: displayTagsToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayTagsToggle: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Membersihp Level'),
    checked: displayLevelToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayLevelToggle: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Social Media Icons'),
    checked: displaySocialMediaIconsToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displaySocialMediaIconsToggle: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Hours'),
    checked: displayHoursToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayHoursToggle: nextValue
      });
    }
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Content Settings'),
    initialOpen: false
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Post Content",
    value: text,
    options: textOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        text: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Enable click-thru to individual listing'),
    checked: singleLinkToggle,
    onChange: setSingleLink
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Image Settings'),
    initialOpen: false
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Type of Image",
    value: image,
    options: imageOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        image: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Image Size",
    value: image_size,
    options: imageSizeOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        image_size: nextValue
      });
    }
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Limit By:'),
    initialOpen: false
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
    className: "cdash_multi_select",
    label: "Categories",
    value: categoryArray,
    options: categoryOptions,
    onChange: setCategories
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
    className: "cdash_multi_select",
    label: "Membership Level",
    value: membershipLevelArray,
    options: membershipLevelOptions,
    onChange: setMembershipLevel
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
    className: "cdash_multi_select",
    label: "Membership Status",
    value: membershipStatusArray,
    options: membershipStatusOptions,
    onChange: setMembershipStatus
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Additional Options'),
    initialOpen: false
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Enable Alpha Search'),
    checked: alphaToggle,
    onChange: setAlpha
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Enable Filter by Category'),
    checked: categoryFilterToggle,
    onChange: setShowCategoryFilter,
    help: !!categoryFilterToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show the filter by category option') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Hide the filter by category option.')
  }))));
  var alignmentControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["BlockControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["AlignmentToolbar"], {
    value: textAlignment,
    onChange: function onChange(newalign) {
      return setAttributes({
        textAlignment: newalign
      });
    }
  }));
  return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: props.className
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1___default.a, {
    block: "cdash-bd-blocks/business-directory",
    attributes: props.attributes
  }), alignmentControls, inspectorControls, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "businesslist"
  }))];
};

/* harmony default export */ __webpack_exports__["default"] = (edit);

/***/ }),

/***/ "./src/business_directory_block/index.js":
/*!***********************************************!*\
  !*** ./src/business_directory_block/index.js ***!
  \***********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/business_directory_block/edit.js");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/**
 * Block dependencies
 */





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('cdash-bd-blocks/business-directory', {
  title: 'Display Business Directory',
  icon: 'store',
  category: 'cd-blocks',
  description: 'The business directory block displays the Business Directoy listings on your page.',
  example: {},
  supports: {
    // Declare support for block's alignment.
    // This adds support for all the options:
    // left, center, right, wide, and full.
    align: ['wide', 'full']
  },
  attributes: {
    align: {
      type: 'string',
      default: ''
    },
    textAlignment: {
      type: 'string',
      default: 'left'
    },
    cd_block: {
      type: 'string',
      default: 'yes'
    },
    postLayout: {
      type: 'string',
      default: 'grid3'
    },
    format: {
      type: 'string',
      default: 'grid3'
    },
    categoryArray: {
      type: 'array',
      default: []
    },
    category: {
      type: 'string',
      default: ''
    },
    tags: {
      type: 'string',
      default: ''
    },
    membershipLevelArray: {
      type: 'array',
      default: []
    },
    level: {
      type: 'string',
      default: ''
    },
    displayPostContent: {
      type: Boolean,
      default: true
    },
    text: {
      type: 'string',
      default: 'none'
    },
    singleLinkToggle: {
      type: 'boolean',
      default: true
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
      default: 'featured'
    },
    membershipStatusArray: {
      type: 'array',
      default: []
    },
    status: {
      type: 'string',
      default: ''
    },
    image_size: {
      type: 'string',
      default: 'medium'
    },
    alphaToggle: {
      type: 'boolean',
      default: false
    },
    alpha: {
      type: 'string',
      default: 'no'
    },
    logo_gallery: {
      type: 'string',
      default: 'no'
    },
    categoryFilterToggle: {
      type: 'boolean',
      default: false
    },
    show_category_filter: {
      type: 'string',
      default: 'no'
    },
    display: {
      type: 'string',
      default: ''
    },
    displayAddressToggle: {
      type: 'boolean',
      default: false
    },
    displayUrlToggle: {
      type: 'boolean',
      default: false
    },
    displayPhoneToggle: {
      type: 'boolean',
      default: false
    },
    displayEmailToggle: {
      type: 'boolean',
      default: false
    },
    displayCategoryToggle: {
      type: 'boolean',
      default: false
    },
    displayTagsToggle: {
      type: 'boolean',
      default: false
    },
    displayLevelToggle: {
      type: 'boolean',
      default: false
    },
    displaySocialMediaIconsToggle: {
      type: 'boolean',
      default: false
    },
    displayLocationNameToggle: {
      type: 'boolean',
      default: false
    },
    displayHoursToggle: {
      type: 'boolean',
      default: false
    },
    changeTitleFontSize: {
      type: 'boolean',
      default: false
    },
    titleFontSize: {
      type: 'number',
      default: 16
    },
    disablePagination: {
      type: 'boolean',
      default: false
    },
    displayImageOnTop: {
      type: 'boolean',
      default: false
    },
    enableBorder: {
      type: 'boolean',
      default: false
    },
    borderColor: {
      type: 'string',
      default: '#000000'
    },
    borderThickness: {
      type: 'number',
      default: 1
    },
    borderStyle: {
      type: 'string',
      default: 'solid'
    },
    borderRadius: {
      type: 'number',
      default: 0
    },
    borderRadiusUnits: {
      type: 'string',
      default: 'px'
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save() {
    // Rendering in PHP
    return null;
  }
});

/***/ }),

/***/ "./src/business_directory_search_block/edit.js":
/*!*****************************************************!*\
  !*** ./src/business_directory_search_block/edit.js ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);






var withState = wp.compose.withState;
var displayFormatOptions = [{
  label: 'List',
  value: 'list'
}, {
  label: 'Responsive',
  value: 'responsive'
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
  value: 'rand'
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
var imageSizeOptions = [{
  label: 'Auto',
  value: ''
}, {
  label: 'Small',
  value: 'thumbnail'
}, {
  label: 'Medium',
  value: 'medium'
}, {
  label: 'Large',
  value: 'large'
}, {
  label: 'Full Width',
  value: 'full'
}];
var titleFontSizes = [{
  name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Small'),
  slug: 'small',
  size: 12
}, {
  name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Medium'),
  slug: 'medium',
  size: 18
}, {
  name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Big'),
  slug: 'big',
  size: 26
}];
var titleFallbackFontSize = 16;

var edit = function edit(props) {
  var _props$attributes = props.attributes,
      searchFormTitleDisplay = _props$attributes.searchFormTitleDisplay,
      searchFormCustomTitle = _props$attributes.searchFormCustomTitle,
      searchFormAlignment = _props$attributes.searchFormAlignment,
      searchFormLabelDisplay = _props$attributes.searchFormLabelDisplay,
      customSearchFormLabel = _props$attributes.customSearchFormLabel,
      categoryFieldDisplay = _props$attributes.categoryFieldDisplay,
      categoryFieldLabelDisplay = _props$attributes.categoryFieldLabelDisplay,
      customCategoryFieldLabel = _props$attributes.customCategoryFieldLabel,
      searchInputPlaceholder = _props$attributes.searchInputPlaceholder,
      searchDisplayFormat = _props$attributes.searchDisplayFormat,
      displayDescription = _props$attributes.displayDescription,
      displayMemberLevel = _props$attributes.displayMemberLevel,
      displayCategory = _props$attributes.displayCategory,
      displayTags = _props$attributes.displayTags,
      displaySocialMedia = _props$attributes.displaySocialMedia,
      displayUrl = _props$attributes.displayUrl,
      displayHours = _props$attributes.displayHours,
      displayEmail = _props$attributes.displayEmail,
      perPage = _props$attributes.perPage,
      orderBy = _props$attributes.orderBy,
      order = _props$attributes.order,
      imageType = _props$attributes.imageType,
      imageSize = _props$attributes.imageSize,
      imageAlignment = _props$attributes.imageAlignment,
      displayLocationName = _props$attributes.displayLocationName,
      displayAddress = _props$attributes.displayAddress,
      displayWebsite = _props$attributes.displayWebsite,
      displayPhone = _props$attributes.displayPhone,
      businessTitleFontSize = _props$attributes.businessTitleFontSize,
      businessLocationNameFontSize = _props$attributes.businessLocationNameFontSize,
      className = props.className,
      setAttributes = props.setAttributes;

  var setResultsPage = function setResultsPage(selectResultsPage) {
    props.setAttributes({
      selectResultsPage: selectResultsPage
    });
  };

  var inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_4__["InspectorControls"], {
    key: "inspector"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Search Form Options')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("label", null, "Search Form Alignment"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_4__["AlignmentToolbar"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Search Form alignment'),
    value: searchFormAlignment,
    onChange: function onChange(nextValue) {
      return setAttributes({
        searchFormAlignment: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show Search Form Title'),
    checked: searchFormTitleDisplay,
    onChange: function onChange(nextValue) {
      return setAttributes({
        searchFormTitleDisplay: nextValue
      });
    }
  })), searchFormTitleDisplay && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
    label: "Custom Search Form Title",
    value: searchFormCustomTitle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        searchFormCustomTitle: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show Search Form Label'),
    checked: searchFormLabelDisplay,
    onChange: function onChange(nextValue) {
      return setAttributes({
        searchFormLabelDisplay: nextValue
      });
    }
  })), searchFormLabelDisplay && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
    label: "Custom Search Form Label",
    value: customSearchFormLabel,
    onChange: function onChange(nextValue) {
      return setAttributes({
        customSearchFormLabel: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
    label: "Search Form Placeholder",
    value: searchInputPlaceholder,
    onChange: function onChange(nextValue) {
      return setAttributes({
        searchInputPlaceholder: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show Category Field'),
    checked: categoryFieldDisplay,
    onChange: function onChange(nextValue) {
      return setAttributes({
        categoryFieldDisplay: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null), categoryFieldDisplay && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show Category Field Label'),
    checked: categoryFieldLabelDisplay,
    onChange: function onChange(nextValue) {
      return setAttributes({
        categoryFieldLabelDisplay: nextValue
      });
    }
  })), categoryFieldDisplay && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, categoryFieldLabelDisplay && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
    label: "Custom Category Label",
    value: customCategoryFieldLabel,
    onChange: function onChange(nextValue) {
      return setAttributes({
        customCategoryFieldLabel: nextValue
      });
    }
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Search Results Options'),
    initialOpen: false
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Search Results Layout",
    value: searchDisplayFormat,
    options: displayFormatOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        searchDisplayFormat: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["RangeControl"], {
    label: "Number of Businesses per page",
    min: -1,
    max: 50,
    value: perPage,
    onChange: function onChange(value) {
      return setAttributes({
        perPage: value
      });
    },
    initialPosition: -1 //allowReset = { true }
    //resetFallbackValue = { -1 }

  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Order By:",
    value: orderBy,
    options: orderbyOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        orderBy: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Order",
    value: order,
    options: orderOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        order: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, "Business Title Font Size"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["FontSizePicker"], {
    fontSizes: titleFontSizes,
    value: businessTitleFontSize,
    fallbackFontSize: titleFallbackFontSize,
    withSlider: "true",
    onChange: function onChange(nextValue) {
      return setAttributes({
        businessTitleFontSize: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, "Location Name Font Size"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["FontSizePicker"], {
    fontSizes: titleFontSizes,
    value: businessLocationNameFontSize,
    fallbackFontSize: titleFallbackFontSize,
    withSlider: "true",
    onChange: function onChange(nextValue) {
      return setAttributes({
        businessLocationNameFontSize: nextValue
      });
    }
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Search Results Image Options'),
    initialOpen: false
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Image Display Options",
    value: imageType,
    options: imageOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        imageType: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Image Size",
    value: imageSize,
    options: imageSizeOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        imageSize: nextValue
      });
    }
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Search Results Display Options'),
    initialOpen: false
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Description'),
    checked: displayDescription,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayDescription: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Membership Level'),
    checked: displayMemberLevel,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayMemberLevel: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Business Categories'),
    checked: displayCategory,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayCategory: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Business Tags'),
    checked: displayTags,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayTags: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Social Media Icons'),
    checked: displaySocialMedia,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displaySocialMedia: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Location Name'),
    checked: displayLocationName,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayLocationName: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Address'),
    checked: displayAddress,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayAddress: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Url'),
    checked: displayWebsite,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayWebsite: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Business Hours'),
    checked: displayHours,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayHours: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Phone Number'),
    checked: displayPhone,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayPhone: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Emails'),
    checked: displayEmail,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayEmail: nextValue
      });
    }
  }))));
  return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: props.className
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1___default.a, {
    block: "cdash-bd-blocks/business-directory-search",
    attributes: props.attributes
  }), inspectorControls, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "business_search"
  }))];
};

/* harmony default export */ __webpack_exports__["default"] = (edit);

/***/ }),

/***/ "./src/business_directory_search_block/index.js":
/*!******************************************************!*\
  !*** ./src/business_directory_search_block/index.js ***!
  \******************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/business_directory_search_block/edit.js");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/**
 * Block dependencies
 */





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('cdash-bd-blocks/business-directory-search', {
  title: 'CD Business Search Block',
  icon: 'search',
  category: 'cd-blocks',
  description: 'The business directory search block displays the search form on your page.',
  example: {},
  attributes: {
    searchFormTitleDisplay: {
      type: 'boolean',
      default: true
    },
    searchFormCustomTitle: {
      type: 'string',
      default: 'Search'
    },
    searchFormAlignment: {
      type: 'string',
      default: 'left'
    },
    searchFormLabelDisplay: {
      type: 'boolean',
      default: true
    },
    customSearchFormLabel: {
      type: 'string',
      default: 'Search Text'
    },
    categoryFieldDisplay: {
      type: 'boolean',
      default: true
    },
    categoryFieldLabelDisplay: {
      type: 'boolean',
      default: true
    },
    customCategoryFieldLabel: {
      type: 'string',
      default: ''
    },
    searchInputPlaceholder: {
      type: 'string',
      default: ''
    },
    searchDisplayFormat: {
      type: 'string',
      default: 'list'
    },
    imageType: {
      type: 'string',
      default: 'featured'
    },
    imageSize: {
      type: 'string',
      default: 'medium'
    },
    imageAlignment: {
      type: 'string',
      default: 'left'
    },
    perPage: {
      type: 'number',
      default: -1
    },
    orderBy: {
      type: 'string',
      default: 'title'
    },
    order: {
      type: 'string',
      default: 'asc'
    },
    displayDescription: {
      type: 'boolean',
      default: true
    },
    displayMemberLevel: {
      type: 'boolean',
      default: true
    },
    displayCategory: {
      type: 'boolean',
      default: true
    },
    displayTags: {
      type: 'boolean',
      default: true
    },
    displaySocialMedia: {
      type: 'boolean',
      default: true
    },
    displayLocationName: {
      type: 'boolean',
      default: true
    },
    displayAddress: {
      type: 'boolean',
      default: true
    },
    displayWebsite: {
      type: 'boolean',
      default: true
    },
    displayHours: {
      type: 'boolean',
      default: true
    },
    displayPhone: {
      type: 'boolean',
      default: true
    },
    displayEmail: {
      type: 'boolean',
      default: true
    },
    businessTitleFontSize: {
      type: 'number',
      default: 26
    },
    businessLocationNameFontSize: {
      type: 'number',
      default: 26
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save() {
    // Rendering in PHP
    return null;
  }
});

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _business_directory_block_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./business_directory_block/index.js */ "./src/business_directory_block/index.js");
/* harmony import */ var _logo_gallery_block_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./logo_gallery_block/index.js */ "./src/logo_gallery_block/index.js");
/* harmony import */ var _business_directory_search_block_index_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./business_directory_search_block/index.js */ "./src/business_directory_search_block/index.js");
/* harmony import */ var _business_category_block_index_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./business_category_block/index.js */ "./src/business_category_block/index.js");





/***/ }),

/***/ "./src/logo_gallery_block/edit.js":
/*!****************************************!*\
  !*** ./src/logo_gallery_block/edit.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);






var withState = wp.compose.withState;
var formatOptions = [{
  label: 'List',
  value: 'list'
}, {
  label: '2 Columns',
  value: 'grid2'
}, {
  label: '3 Columns',
  value: 'grid3'
}, {
  label: '4 Columns',
  value: 'grid4'
}, {
  label: 'Responsive',
  value: 'responsive'
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
  value: 'rand'
}];
var orderOptions = [{
  label: 'Ascending',
  value: 'asc'
}, {
  label: 'Descending',
  value: 'desc'
}];
var imageSizeOptions = [{
  label: 'Auto',
  value: ''
}, {
  label: 'Small',
  value: 'thumbnail'
}, {
  label: 'Medium',
  value: 'medium'
}, {
  label: 'Large',
  value: 'large'
}, {
  label: 'Full Width',
  value: 'full'
}];
var categoryOptions = [{
  label: 'Select one or more categories',
  value: null
}];
wp.apiFetch({
  path: "/wp/v2/business_category?per_page=100"
}).then(function (posts) {
  jQuery.each(posts, function (key, val) {
    categoryOptions.push({
      label: val.name,
      value: val.slug
    });
  });
}).catch();
var membershipLevelOptions = [{
  label: 'Select one or more Membersihp Levels',
  value: null
}];
var membershipStatusOptions = [//{ label: 'Select a Membership Status', value: null }
];
var fetchUrlAction = wpAjax.wpurl + '/wp-admin/admin-ajax.php?action=cdash_check_mm_active_action';
wp.apiFetch({
  url: fetchUrlAction
}).then(function (response) {
  if (response.cdash_mm_active) {
    wp.apiFetch({
      path: "/wp/v2/membership_status?per_page=100"
    }).then(function (posts) {
      jQuery.each(posts, function (key, val) {
        membershipStatusOptions.push({
          label: val.name,
          value: val.slug
        });
      });
    });
  }
});
wp.apiFetch({
  path: "/wp/v2/membership_level?per_page=100"
}).then(function (posts) {
  jQuery.each(posts, function (key, val) {
    membershipLevelOptions.push({
      label: val.name,
      value: val.slug
    });
  });
});

var edit = function edit(props) {
  var _props$attributes = props.attributes,
      cd_block = _props$attributes.cd_block,
      postLayout = _props$attributes.postLayout,
      format = _props$attributes.format,
      categoryArray = _props$attributes.categoryArray,
      category = _props$attributes.category,
      tags = _props$attributes.tags,
      membershipLevelArray = _props$attributes.membershipLevelArray,
      level = _props$attributes.level,
      displayPostContent = _props$attributes.displayPostContent,
      display = _props$attributes.display,
      text = _props$attributes.text,
      singleLinkToggle = _props$attributes.singleLinkToggle,
      single_link = _props$attributes.single_link,
      perpage = _props$attributes.perpage,
      orderby = _props$attributes.orderby,
      order = _props$attributes.order,
      image = _props$attributes.image,
      membershipStatusArray = _props$attributes.membershipStatusArray,
      status = _props$attributes.status,
      image_size = _props$attributes.image_size,
      alpha = _props$attributes.alpha,
      logo_gallery = _props$attributes.logo_gallery,
      categoryFilterToggle = _props$attributes.categoryFilterToggle,
      show_category_filter = _props$attributes.show_category_filter,
      titleFontSize = _props$attributes.titleFontSize,
      disablePagination = _props$attributes.disablePagination,
      className = props.className,
      setAttributes = props.setAttributes;

  var setDirectoryLayout = function setDirectoryLayout(format) {
    props.setAttributes({
      format: format
    });
  };

  var setCategories = function setCategories(categoryArray) {
    props.setAttributes({
      categoryArray: categoryArray
    });
    console.log(categoryArray);
  };

  var setMembershipLevel = function setMembershipLevel(membershipLevelArray) {
    props.setAttributes({
      membershipLevelArray: membershipLevelArray
    });
  };

  var setMembershipStatus = function setMembershipStatus(membershipStatusArray) {
    props.setAttributes({
      membershipStatusArray: membershipStatusArray
    });
  };

  var setSingleLink = function setSingleLink(singleLinkToggle) {
    props.setAttributes({
      singleLinkToggle: singleLinkToggle
    });
    !!singleLinkToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      single_link: 'yes'
    })) : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      single_link: 'no'
    }));
  };

  var inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_4__["InspectorControls"], {
    key: "inspector"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Formatting Options')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Directory Layout",
    value: format,
    options: formatOptions
    /*onChange={ ( nextValue ) =>
        setAttributes( { format:  nextValue } )
    }*/
    ,
    onChange: setDirectoryLayout
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Order By",
    value: orderby,
    options: orderbyOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        orderby: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Order",
    value: order,
    options: orderOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        order: nextValue
      });
    }
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Enable click-thru to individual listing'),
    checked: singleLinkToggle,
    onChange: setSingleLink
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    label: "Image Size",
    value: image_size,
    options: imageSizeOptions,
    onChange: function onChange(nextValue) {
      return setAttributes({
        image_size: nextValue
      });
    }
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Limit By:'),
    initialOpen: false
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
    className: "cdash_multi_select",
    label: "Categories",
    value: categoryArray,
    options: categoryOptions,
    onChange: setCategories
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
    className: "cdash_multi_select",
    label: "Membership Level",
    value: membershipLevelArray,
    options: membershipLevelOptions,
    onChange: setMembershipLevel
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
    className: "cdash_multi_select",
    label: "Membership Status",
    value: membershipStatusArray,
    options: membershipStatusOptions,
    onChange: setMembershipStatus
  }))));
  return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: props.className
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1___default.a, {
    block: "cdash-bd-blocks/logo-gallery",
    attributes: props.attributes
  }), inspectorControls, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "businesslist"
  }))];
};

/* harmony default export */ __webpack_exports__["default"] = (edit);

/***/ }),

/***/ "./src/logo_gallery_block/index.js":
/*!*****************************************!*\
  !*** ./src/logo_gallery_block/index.js ***!
  \*****************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/logo_gallery_block/edit.js");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/**
 * Block dependencies
 */





 //const { withState, setState } = wp.compose;

Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('cdash-bd-blocks/logo-gallery', {
  title: 'Logo Gallery',
  icon: 'format-gallery',
  category: 'cd-blocks',
  description: 'The logo gallery block displays the Business Logos without the name, description or other fields.',
  example: {},
  attributes: {
    cd_block: {
      type: 'string',
      default: 'yes'
    },
    postLayout: {
      type: 'string',
      default: 'grid3'
    },
    format: {
      type: 'string',
      default: 'grid3'
    },
    categoryArray: {
      type: 'array',
      default: []
    },
    category: {
      type: 'string',
      default: ''
    },
    tags: {
      type: 'string',
      default: ''
    },
    membershipLevelArray: {
      type: 'array',
      default: []
    },
    level: {
      type: 'string',
      default: ''
    },
    displayPostContent: {
      type: Boolean,
      default: true
    },
    display: {
      type: 'string',
      default: ''
    },
    text: {
      type: 'string',
      default: 'none'
    },
    singleLinkToggle: {
      type: 'boolean',
      default: true
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
    membershipStatusArray: {
      type: 'array',
      default: []
    },
    status: {
      type: 'string',
      default: ''
    },
    image_size: {
      type: 'string',
      default: 'medium'
    },
    alpha: {
      type: 'string',
      default: 'no'
    },
    logo_gallery: {
      type: 'string',
      default: 'yes'
    },
    show_category_filter: {
      type: 'string',
      default: 'no'
    },
    titleFontSize: {
      type: 'number',
      default: 16
    },
    disablePagination: {
      type: 'boolean',
      default: false
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save() {
    // Rendering in PHP
    return null;
  }
});

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blockEditor"]; }());

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blocks"]; }());

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/compose":
/*!*********************************!*\
  !*** external ["wp","compose"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["compose"]; }());

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["data"]; }());

/***/ }),

/***/ "@wordpress/date":
/*!******************************!*\
  !*** external ["wp","date"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["date"]; }());

/***/ }),

/***/ "@wordpress/editor":
/*!********************************!*\
  !*** external ["wp","editor"] ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["editor"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["i18n"]; }());

/***/ }),

/***/ "@wordpress/server-side-render":
/*!******************************************!*\
  !*** external ["wp","serverSideRender"] ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["serverSideRender"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map