# Modern Portfolio WordPress Theme

A beautiful, modern portfolio WordPress theme inspired by contemporary design trends. This theme features a clean, minimal design with smooth animations and interactive elements.

## Features

- **WordPress Theme**: Fully functional WordPress theme ready to activate
- **Responsive Design**: Fully responsive layout that works on all devices
- **Modern UI/UX**: Clean, minimal design with smooth transitions
- **Custom Post Types**: Portfolio and Testimonials custom post types
- **Interactive Portfolio**: Filterable portfolio grid with category filters
- **Testimonials Carousel**: Auto-playing carousel with manual controls
- **Customizer Integration**: Easy customization through WordPress Customizer
- **Smooth Scrolling**: Smooth navigation between sections
- **Animated Elements**: Scroll-triggered animations for better user experience
- **Mobile Menu**: Hamburger menu for mobile devices

## Sections

1. **Header/Navigation**: Fixed header with navigation menu and "Hire!" button
2. **Hero Section**: Eye-catching hero with statistics, social links, and filter buttons
3. **Features Section**: Three feature cards with images and descriptions
4. **Education & Experience Timeline**: Timeline showing education and work experience
5. **Portfolio Grid**: Filterable portfolio gallery with projects
6. **Testimonials**: Client testimonials carousel
7. **CTA Section**: Call-to-action section with contact information
8. **Footer**: Footer with navigation links and social media icons

## Installation

1. **Upload the theme folder to WordPress**:
   - Upload the entire `portfolio` folder to `/wp-content/themes/` directory
   - Or zip the folder and upload via WordPress Admin → Appearance → Themes → Add New → Upload Theme

2. **Activate the theme**:
   - Go to WordPress Admin → Appearance → Themes
   - Find "Modern Portfolio" theme
   - Click "Activate"

3. **Configure the theme**:
   - Go to WordPress Admin → Appearance → Customize
   - Customize Hero Section (title, description, stats, image)
   - Add Social Links (Instagram, TikTok, Dribbble, Behance)
   - Add Contact Information (location, email, phone)

4. **Add content**:
   - Create Portfolio items: Go to Portfolio → Add New
   - Add Portfolio Categories: Go to Portfolio → Categories
   - Create Testimonials: Go to Testimonials → Add New
   - Create Navigation Menu: Go to Appearance → Menus

## Theme Customization

### WordPress Customizer
Go to **Appearance → Customize** to customize:

- **Hero Section**: Title, description, years of experience, projects done, hero image
- **Social Links**: Instagram, TikTok, Dribbble, Behance URLs
- **Contact Information**: Location, email, phone

### Custom Post Types

#### Portfolio
- Add portfolio items: **Portfolio → Add New**
- Add categories: **Portfolio → Categories**
- Featured images are used as portfolio thumbnails

#### Testimonials
- Add testimonials: **Testimonials → Add New**
- Featured images are used as client avatars
- Post content is used as testimonial text
- Title is used as client name

### Menus
Create and assign menus:
- **Primary Menu**: Main navigation (Header)
- **Footer Menu**: Footer navigation

Go to **Appearance → Menus** to create and assign menus.

### Colors
Edit the CSS variables in `style.css`:
```css
:root {
    --primary-color: #000;
    --accent-color: #6366f1;
    /* ... other colors */
}
```

## File Structure

```
portfolio/
├── style.css              # Main stylesheet with theme header
├── functions.php          # Theme functions and setup
├── index.php             # Main template file
├── front-page.php        # Front page template
├── header.php            # Header template
├── footer.php            # Footer template
├── single.php            # Single post template
├── archive.php           # Archive template
├── template-tags.php     # Template tag functions
├── template-parts/       # Template parts
│   ├── content.php
│   ├── content-none.php
│   ├── content-front-page.php
│   └── sections/
│       ├── hero.php
│       ├── features.php
│       ├── timeline.php
│       ├── portfolio.php
│       ├── testimonials.php
│       └── cta.php
└── js/
    └── script.js         # Theme JavaScript
```

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher

## Technologies Used

- WordPress
- PHP
- HTML5
- CSS3 (with CSS Grid and Flexbox)
- JavaScript (jQuery)
- Font Awesome (for icons)

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## License

This WordPress theme is licensed under the GPL (GNU General Public License) v2 or later, just like WordPress.

## Support

For theme support and customization help, please refer to WordPress documentation or contact your developer.

