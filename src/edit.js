import ServerSideRender from '@wordpress/server-side-render';
import { __ } from '@wordpress/i18n';
import { SelectControl } from '@wordpress/components';
import { withSelect } from '@wordpress/data';

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
    ToolbarGroup,
    Disabled, 
    RadioControl,
} = wp.components;

const formatOptions = [
    { label: 'List', value: 'list' },
    { label: '2 Columns', value: 'grid2' },
    { label: '3 Columns', value: 'grid3' },
    { label: '4 Columns', value: 'grid4' },
    { label: 'Responsive', value: 'responsive' },
 ];
const textOptions = [
    { label: 'Excerpt', value: 'excerpt' },
    { label: 'Description', value: 'description' },
    { label: 'None', value: 'none' },
 ];
const orderbyOptions = [
    { label: 'Title', value: 'title' },
    { label: 'Date', value: 'date' },
    { label: 'Menu Order', value: 'menu_order' },
    { label: 'Random', value: 'random' },
    { label: 'Membership Level', value: 'membership_level' },
 ];

const orderOptions = [
    { label: 'Ascending', value: 'asc' },
    { label: 'Descending', value: 'desc' },
];

const imageOptions = [
    { label: 'Logo', value: 'logo' },
    { label: 'Featured Image', value: 'featured' },
    { label: 'None', value: 'none' },
];

const imageSizeOptions = [
    { label: 'Small', value: 'small' },
    { label: 'Medium', value: 'medium' },
    { label: 'Large', value: 'large' },
    { label: 'Full Width', value: 'full_width' },
];

const postSelections = [];

/*const allPosts = wp.apiFetch({path: "/wp/v2/taxonomies/business_category"}).then(posts => {
    postSelections.push({label: "Select Categories", value: 0});
    $.each( posts, function( key, val ) {
        postSelections.push({label: val.title.rendered, value: val.id});
    });
    return postSelections;
});*/

const edit = props => {
    const {attributes: {postLayout, format, category, tags, level, displayPostContent, text, singleLinkToggle, single_link, perpage, orderby, order, image,status, image_size, alphaToggle, alpha, logoGalleryToggle, logo_gallery, categoryFilterToggle,  show_category_filter }, className, setAttributes } = props;
    const setDirectoryLayout = format => {
        props.setAttributes( { format } );
    };
    const setSingleLink = singleLinkToggle =>{
        props.setAttributes({singleLinkToggle})
        !! singleLinkToggle ? __( props.setAttributes({single_link: 'yes'}) ) : __( props.setAttributes({single_link: 'no'}) )
        
    };
    const setAlpha = alphaToggle =>{
        props.setAttributes({alphaToggle})
        !! alphaToggle ? __( props.setAttributes({alpha: 'yes'}) ) : __( props.setAttributes({alpha: 'no'}) )
        
    };
    const setLogoGallery = logoGalleryToggle =>{
        props.setAttributes({logoGalleryToggle})
        !! logoGalleryToggle ? __( props.setAttributes({logo_gallery: 'yes'}) ) : __( props.setAttributes({logo_gallery: 'no'}) )
        
    };
    const setShowCategoryFilter = categoryFilterToggle =>{
        props.setAttributes({categoryFilterToggle})
        !! categoryFilterToggle ? __( props.setAttributes({show_category_filter: 'yes'}) ) : __( props.setAttributes({show_category_filter: 'no'}) )
        
    };
    const inspectorControls = (
        <InspectorControls key="inspector">
            <PanelBody title={ __( 'Business Directory Options' )}>
                <PanelRow>
                    <SelectControl
                        label="Directory Layout"
                        value={ format }
                        options= { formatOptions }
                        /*onChange={ ( nextValue ) =>
                            setAttributes( { format:  nextValue } )
                        }*/
                        onChange = {setDirectoryLayout}
                    />
                </PanelRow>
                <PanelRow>
                    <SelectControl 
                        label = "Limit by Categories"
                        value = {category}
                        options = {postSelections}
                    />
                </PanelRow>
                <PanelRow>
                    <SelectControl
                        label="Post Content"
                        value={ text }
                        options= { textOptions }
                        onChange={ ( nextValue ) =>
                            setAttributes( { text:  nextValue } )
                        }
                    />
                </PanelRow>
                <PanelRow>
                    <SelectControl
                        label="Type of Image"
                        value={image}
                        options= { imageOptions }
                        onChange={ ( nextValue ) =>
                            setAttributes( { image:  nextValue } )
                        }
                    />
                </PanelRow>
                <PanelRow>
                    <SelectControl
                        label="Image Size"
                        value={image_size}
                        options= { imageSizeOptions }
                        onChange={ ( nextValue ) =>
                            setAttributes( { image_size:  nextValue } )
                        }
                    />
                </PanelRow>
                <PanelRow>
                    <SelectControl
                        label="Order By"
                        value={orderby}
                        options= { orderbyOptions }
                        onChange={ ( nextValue ) =>
                            setAttributes( {orderby:  nextValue } )
                        }
                    />
                </PanelRow>
                <PanelRow>
                    <SelectControl
                        label="Order"
                        value={order}
                        options= { orderOptions }
                        onChange={ ( nextValue ) =>
                            setAttributes( {order:  nextValue } )
                        }
                    />
                </PanelRow>
                <PanelRow>
                    <ToggleControl
						label={ __( 'Single Link' ) }
						checked={ singleLinkToggle }
						/*onChange={ ( value ) =>
							setAttributes( { single_link: value } )
                        }*/
                        onChange = {setSingleLink}
                        help={ !! singleLinkToggle ? __( 'Show the link' ) : __( 'Hide the link.' ) }
					/>
                </PanelRow>
                <PanelRow>
                    <ToggleControl
						label={ __( 'Show Alpha' ) }
						checked={ alphaToggle }
						/*onChange={ ( value ) =>
							setAttributes( { single_link: value } )
                        }*/
                        onChange = {setAlpha}
                        help={ !! alphaToggle ? __( 'Show the alphabets' ) : __( 'Hide the alphabets.' ) }
					/>
                </PanelRow>
                <PanelRow>
                    <ToggleControl
						label={ __( 'Enable Logo Gallery' ) }
						checked={ logoGalleryToggle }
						/*onChange={ ( value ) =>
							setAttributes( { single_link: value } )
                        }*/
                        onChange = {setLogoGallery}
                        help={ !! logoGalleryToggle ? __( 'Show the logo gallery' ) : __( 'Hide the logo gallery.' ) }
					/>
                </PanelRow>
                <PanelRow>
                    <ToggleControl
						label={ __( 'Enable Filter by Category' ) }
						checked={ categoryFilterToggle }
						/*onChange={ ( value ) =>
							setAttributes( { single_link: value } )
                        }*/
                        onChange = {setShowCategoryFilter}
                        help={ !! categoryFilterToggle ? __( 'Show the filter by category option' ) : __( 'Hide the filter by category option.' ) }
					/>
                </PanelRow>
            </PanelBody>
            <PanelBody title={ __( 'Display Options' )}>
                <PanelRow>
                    
                </PanelRow>
            </PanelBody>
        </InspectorControls>
    );
    return [
        <div className={ props.className }>
            <ServerSideRender
                block="cdash-bd-blocks/business-directory"
                attributes = {props.attributes}
            />
            { inspectorControls }
            <div className="businesslist">
                <div className="bus_directory">CD Business Directory
                    <p>Format: {format}</p>
                    <p>Text: {text}</p>
                    
                </div>
            </div>
        </div>
    ];
};

export default edit;


