import { registerBlockType } from '@wordpress/blocks';
import { SelectControl } from '@wordpress/components';
import ServerSideRender from '@wordpress/server-side-render';
//import { withState } from '@wordpress/compose';
//import { setState } from '@wordpress/compose';
const { withState, setState } = wp.compose;
const {
    RichText,
    AlignmentToolbar,
    BlockControls,
    BlockAlignmentToolbar,
    InspectorControls,
    InnerBlocks,
    withColors,
    PanelColorSettings,
    getColorClassName
  } = wp.editor;

  const {
    Toolbar,
    Button,
    Tooltip,
    PanelBody,
    PanelRow,
    FormToggle,
    ToggleControl,
    Disabled 
} = wp.components;

const MyServerSideRender = () => (
    <ServerSideRender
        block="cdash-bd-blocks/business-directory"
        attributes={ {
            format: 'list',
            category: '',
            tags: '',
            level: '',
            text: 'excerpt',
            single_link: 'yes',
            perpage: -1,
            orderby: 'title',
            order: 'asc',
            image: 'logo',
            status: '',
            image_size: '',
            alphpa: 'no',
            logo_gallery: 'no',
            show_category_filter: 'no',
        } }
    />
);

const formatOptions = [
    { label: 'List', value: 'list' },
    { label: 'Grid 2', value: 'grid2' },
    { label: 'Grid 3', value: 'grid3' },
    { label: 'Grid 4', value: 'grid4' },
    { label: 'Responsive', value: 'responsive' },   
 ];
    
 
registerBlockType( 'cdash-bd-blocks/business-directory', {
    title: 'Display Business Directory',
    icon: 'admin-home',
    category: 'cd-blocks',
    attributes: {
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
        text:{
            type: 'string',
            default: 'excerpt',
        },
        single_link:{
            type: 'string',
            default: 'yes',
        },
        parpage:{
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
        alpha:{
            type: 'string',
            default: 'no',
        },
        logo_gallery:{
            type: 'string',
            default: 'no',
        },
        show_category_filter:{
            type: 'string',
            default: 'no',
        },

    },
    edit: props => {
        const {attributes: { format, category, tags, level, text, single_link, perpage, orderby, order, image,status, image_size, alpha, logo_gallery, show_category_filter }, className } = props;
		return [
            <div className={ props.className }>
                <Disabled>
                    <ServerSideRender
                        block="cdash-bd-blocks/business-directory"
                        //attributes={ {format, category, tags, level, text, single_link, perpage, orderby, order, image,status, image_size, alpha, logo_gallery, show_category_filter }}
                        attributes = {props.attributes}
                    />
                </Disabled>
                <InspectorControls key="inspector">
                    <PanelBody title={ __( 'Business Directory Display Options' ) } >
                        <PanelRow>
                        <SelectControl
                            label="Format"
                            value={ props.attributes.format }
                            options= { formatOptions }
                            onChange={ (nextValue) => {
                                props.setAttributes({
                                    format: nextValue
                                });
                            }}
                        />

                        </ PanelRow>
                    </PanelBody>
                </InspectorControls>
                <div className="businesslist">
                    <div className="bus_directory">CD Business Directory
                        <p>Format: {format}</p>
                    </div>
                    
                </div>
            </div>
        ];
	},
    save() {
        // Rendering in PHP
        return null;
    },
} );