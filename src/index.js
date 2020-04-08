/**
 * Block dependencies
 */
import edit from './edit';

import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { dateI18n, format, __experimentalGetSettings } from '@wordpress/date';
//import { withState } from '@wordpress/compose';
//import { setState } from '@wordpress/compose';
const { withState, setState } = wp.compose;

registerBlockType( 'cdash-bd-blocks/business-directory', {
    title: 'Display Business Directory',
    icon: 'admin-home',
    category: 'cd-blocks',
    attributes: {
        postLayout: {
			type: 'string',
			default: 'list',
		},
        format: {
            type: 'string',
            default: 'list',
        },
        category:{
            type: 'string',
            default: '',
        },
        tags:{
            type: 'string',
            default: '',
        },
        level:{
            type: 'string',
            default: '',
        },
        displayPostContent:{
            type:Boolean,
            default: true,        
        },
        text:{
            type: 'string',
            default: 'excerpt',
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
            default: 'logo',
        },
        status:{
            type: 'string',
            default: '',
        },
        image_size:{
            type: 'number',
            default: '',
        },
        alphaToggle:{
            type: 'boolean',
            default: false,
        },
        alpha:{
            type: 'string',
            default: 'no',
        },
        logoGalleryToggle:{
            type: 'boolean',
            default: false,
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

    },
    edit: edit,
    save() {
        // Rendering in PHP
        return null;
    },
} );