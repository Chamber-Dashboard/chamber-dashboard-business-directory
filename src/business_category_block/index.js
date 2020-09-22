/**
 * Block dependencies
 */

//import edit from './edit';

import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { dateI18n, format, __experimentalGetSettings } from '@wordpress/date';
import { setState } from '@wordpress/compose';

registerBlockType( 'cdash-bd-blocks/business-directory', {
    title: 'Display Business Directory',
    icon: 'store',
    category: 'cd-blocks',
    description: 'The business directory block displays the Business Directoy listings on your page.',
    example: {
    },
    attributes: {
        cd_block:{
            type: 'string',
            default: 'yes',
        },
        format: {
             type: 'string',
             default: 'list',
        },
        orderby: {
            type: 'string',
            default: 'name',
        },
        order: {
            type: 'string',
            default: 'ASC',
        },
        showcount: {
            type: 'string',
            default: '0',
        },
        showCountToggle: {
            type: 'boolean',
            default: false,
        },
        hierarchical: {
            type: 'string',
            default: '1',
        },
        hierarchyToggle: {
            type: 'boolean',
            default: true,
        },
        hide_empty: {
            type: 'string',
            default: '1',
        },
        hideEmptyToggle: {
            type: 'boolean',
            default: true,
        },
        child_of: {
            type: 'number',
            default: 0,
        },
        exclude: {
            type: 'number',
            default: '',
        },
    },
});