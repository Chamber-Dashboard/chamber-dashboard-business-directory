
/*const {
    attributes,
    setAttributes,
    imageSizeOptions,
    latestPosts,
    defaultImageWidth,
    defaultImageHeight,
} = props;*/

/*const {
    format,
    category,
    tags,
    level,
    text,
    single_link,
    perpage,
    orderby,
    order,
    image,
    status,
    image_size,
    alpha,
    logo_gallery,
    show_category_filter,
} = attributes;*/


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


