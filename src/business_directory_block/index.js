/**
 * Block dependencies
 */

import edit from './edit';

import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { dateI18n, format, __experimentalGetSettings } from '@wordpress/date';
import { setState } from '@wordpress/compose';

registerBlockType( 'cdash-bd-blocks/business-directory', {
    title: 'Display Business Directory',
    icon: 'admin-home',
    category: 'cd-blocks',
    attributes: {
        cd_block:{
            type: 'string',
            default: 'yes',
        },
        postLayout: {
             type: 'string',
             default: 'grid3',
	},
        format: {
            type: 'string',
            default: 'grid3',
        },
        categoryArray:{
            type: 'array',
            default: [],
        },
        category:{
            type: 'string',
            default: '',
        },
        tags:{
            type: 'string',
            default: '',
        },
        membershipLevelArray:{
            type: 'array',
            default: [],
        },
        level:{
            type: 'string',
            default: '',
        },
        displayPostContent:{
            type:Boolean,
            default: true,        
        },
        display:{
            type: 'string',
            default: '',
        },
        text:{
            type: 'string',
            default: 'none',
        },
        singleLinkToggle: {
            type: 'boolean',
            default: true,
        },
        single_link:{
            type: 'string',
            default: 'yes',
        },
        perpage:{
            type: 'number',
            default: -1,
        },
        orderby:{
            type: 'string',
            default: 'title',
        },
        order:{
            type: 'string',
            default: 'asc',
        },
        image:{
            type: 'string',
            default: 'featured',
        },
        membershipStatusArray:{
            type: 'array',
            default: [],
        },
        status:{
            type: 'string',
            default: '',
        },
        image_size:{
            type: 'string',
            default: 'medium',
        },
        alphaToggle:{
            type: 'boolean',
            default: false,
        },
        alpha:{
            type: 'string',
            default: 'no',
        },
        logo_gallery:{
            type: 'string',
            default: 'no',
        },
        categoryFilterToggle:{
            type: 'boolean',
            default: false,
        },
        show_category_filter:{
            type: 'string',
            default: 'no',
        },
        displayAddressToggle:{
            type: 'boolean',
            default: false,
        },
        displayUrlToggle:{
            type: 'boolean',
            default: false,
        },
        displayPhoneToggle:{
            type: 'boolean',
            default: false,
        },
        displayEmailToggle:{
            type: 'boolean',
            default: false,
        },
        displayCategoryToggle:{
            type: 'boolean',
            default: false,
        },
        displayLevelToggle:{
            type: 'boolean',
            default: false,
        },
        displaySocialMediaIconsToggle:{
            type: 'boolean',
            default: false,
        },
        displayLocationNameToggle:{
            type: 'boolean',
            default: false,
        },
        displayHoursToggle:{
            type: 'boolean',
            default: false,
        },
        changeTitleFontSize:{
            type: 'boolean',
            default: false,
        },
        titleFontSize:{
            type: 'number',
            default: 16,
        },
        disablePagination:{
            type: 'boolean',
            default: false,
        },
    },
    edit: edit,
    save() {
        // Rendering in PHP
        return null;
    },
} );