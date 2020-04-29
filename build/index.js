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
var imageSizeOptions = [{
  label: 'Small',
  value: 'small'
}, {
  label: 'Medium',
  value: 'medium'
}, {
  label: 'Large',
  value: 'large'
}, {
  label: 'Full Width',
  value: 'full_width'
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
var titleFontSizes = [{
  name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Small'),
  slug: 'small',
  size: 12
}, {
  name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Medium'),
  slug: 'small',
  size: 18
}, {
  name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Big'),
  slug: 'big',
  size: 26
}];
var titleFallbackFontSize = 16;
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
      alphaToggle = _props$attributes.alphaToggle,
      alpha = _props$attributes.alpha,
      logoGalleryToggle = _props$attributes.logoGalleryToggle,
      logo_gallery = _props$attributes.logo_gallery,
      categoryFilterToggle = _props$attributes.categoryFilterToggle,
      show_category_filter = _props$attributes.show_category_filter,
      displayAddressToggle = _props$attributes.displayAddressToggle,
      displayUrlToggle = _props$attributes.displayUrlToggle,
      displayPhoneToggle = _props$attributes.displayPhoneToggle,
      displayEmailToggle = _props$attributes.displayEmailToggle,
      displayLocationNameToggle = _props$attributes.displayLocationNameToggle,
      displayCategoryToggle = _props$attributes.displayCategoryToggle,
      displayLevelToggle = _props$attributes.displayLevelToggle,
      displaySocialMediaIconsToggle = _props$attributes.displaySocialMediaIconsToggle,
      displayLocationToggle = _props$attributes.displayLocationToggle,
      displayHoursToggle = _props$attributes.displayHoursToggle,
      changeTitleFontSize = _props$attributes.changeTitleFontSize,
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

  var setLogoGallery = function setLogoGallery(logoGalleryToggle) {
    props.setAttributes({
      logoGalleryToggle: logoGalleryToggle
    });
    !!logoGalleryToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      logo_gallery: 'yes'
    })) : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])(props.setAttributes({
      logo_gallery: 'no'
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
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Options'),
    initialOpen: false
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Address'),
    checked: displayAddressToggle //onChange = {setDisplayAddressToggle}
    ,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayAddressToggle: nextValue
      });
    },
    help: !!displayAddressToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show the address') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Hide the address.')
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
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Display Location'),
    checked: displayLocationToggle,
    onChange: function onChange(nextValue) {
      return setAttributes({
        displayLocationToggle: nextValue
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
    label: "Categories",
    value: categoryArray,
    options: categoryOptions,
    onChange: setCategories
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
    label: "Membership Level",
    value: membershipLevelArray,
    options: membershipLevelOptions,
    onChange: setMembershipLevel
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
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
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Enable Logo Gallery'),
    checked: logoGalleryToggle,
    onChange: setLogoGallery,
    help: !!logoGalleryToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show the logo gallery') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Hide the logo gallery.')
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Enable Filter by Category'),
    checked: categoryFilterToggle,
    onChange: setShowCategoryFilter,
    help: !!categoryFilterToggle ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show the filter by category option') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Hide the filter by category option.')
  }))));
  return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: props.className
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_1___default.a, {
    block: "cdash-bd-blocks/business-directory",
    attributes: props.attributes
  }), inspectorControls, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
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



 //import { withState } from '@wordpress/compose';

 //const { withState, setState } = wp.compose;

Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('cdash-bd-blocks/business-directory', {
  title: 'Display Business Directory',
  icon: 'admin-home',
  category: 'cd-blocks',
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
      type: 'number',
      default: ''
    },
    alphaToggle: {
      type: 'boolean',
      default: false
    },
    alpha: {
      type: 'string',
      default: 'no'
    },
    logoGalleryToggle: {
      type: 'boolean',
      default: false
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
    displayAddressToggle: {
      type: 'boolean',
      default: false
    },
    displayUrlToggle: {
      type: 'boolean',
      default: true
    },
    displayPhoneToggle: {
      type: 'boolean',
      default: true
    },
    displayEmailToggle: {
      type: 'boolean',
      default: true
    },
    displayLocationNameToggle: {
      type: 'boolean',
      default: false
    },
    displayCategoryToggle: {
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
    displayLocationToggle: {
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
var imageSizeOptions = [{
  label: 'Small',
  value: 'small'
}, {
  label: 'Medium',
  value: 'medium'
}, {
  label: 'Large',
  value: 'large'
}, {
  label: 'Full Width',
  value: 'full_width'
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
    label: "Categories",
    value: categoryArray,
    options: categoryOptions,
    onChange: setCategories
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
    label: "Membership Level",
    value: membershipLevelArray,
    options: membershipLevelOptions,
    onChange: setMembershipLevel
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
    multiple: true,
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
  icon: 'admin-home',
  category: 'cd-blocks',
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
      type: 'number',
      default: ''
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

/***/ "@wordpress/compose":
/*!******************************************!*\
  !*** external {"this":["wp","compose"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["compose"]; }());

/***/ }),

/***/ "@wordpress/data":
/*!***************************************!*\
  !*** external {"this":["wp","data"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["data"]; }());

/***/ }),

/***/ "@wordpress/date":
/*!***************************************!*\
  !*** external {"this":["wp","date"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["date"]; }());

/***/ }),

/***/ "@wordpress/editor":
/*!*****************************************!*\
  !*** external {"this":["wp","editor"]} ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["editor"]; }());

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