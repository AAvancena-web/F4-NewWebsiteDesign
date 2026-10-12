# F4 New Website Design

A custom WordPress theme for the F4 Group Holdings Limited redesign (https://f4.co.nz/). It has a premium dark and red look, a homepage built to convert, and a global header and footer.

## Install

1. Download `f4-theme.zip` from this repository. You can also zip the `f4-theme` folder yourself.
2. In WordPress, go to **Appearance > Themes > Add New > Upload Theme**, then upload and activate it.
3. When you activate the theme, it does a one-time setup:
   - Creates the pages: Home, F4 Group Holdings Limited, Services (plus the 4 service pages), Franchise Opportunity (plus 5 city pages), Contact and Get a Free Quote. Pages that already exist are kept.
   - Assigns the right template to each page.
   - Sets Home as the static front page and uses `/%postname%/` permalinks (if none are set).
   - Builds the **F4 Primary** menu with dropdowns.
4. Go to **Appearance > Customize > F4 Theme Settings** and set the phone, email, map location, form recipient and social links.

## Structure

```
f4-theme/
  header.php / footer.php        Global header and footer (footer includes the pre-footer contact section)
  front-page.php                 Homepage
  page.php, index.php, single.php, 404.php, searchform.php, comments.php
  page-templates/
    template-service.php         Service detail (matched by slug)
    template-services.php        Services overview
    template-franchise.php       Franchise opportunity
    template-location.php        Franchise city page (matched by slug)
    template-contact.php         Contact
    template-quote.php           Free quote
  template-parts/                Page hero, contact section, CTA band, service cards, FAQ, franchise form, post card
  inc/
    data.php                     All site copy (taken from the current f4.co.nz)
    forms.php                    Built-in quote, contact and franchise forms (wp_mail)
    customizer.php               Theme settings
    activation.php               One-time page, menu and front page setup
    menus.php, helpers.php, icons.php, setup.php
  assets/css/main.css, assets/js/main.js, assets/fonts (self-hosted), assets/img
design-assets/original-images/   Original images from f4.co.nz (source files)
```

## How the brief is covered

- **Banner:** the H1, paragraph and CTAs sit on the left, with a quote form on the right. The banner content shows straight away with no reveal animation. Only the background image has a slow zoom.
- **Above the footer:** a global section with contact info cards, a Google Map embed (no API key needed) and a contact form. It is hidden on the Contact and Quote pages so content isn't duplicated.
- **Widths:** the container is a max of 1440px, and 1880px on screens 1920px and wider.
- **Header:** a circular phone icon with a dark background and border sits to the left of the hamburger menu. On desktop it also shows the number.
- **Mobile:** a floating "Call now" button sits at the bottom centre of the screen.
- **No em dashes or en dashes** anywhere, including eyebrows. Eyebrows use a small diamond marker, and the page title separator is a pipe.
- **CTAs:** every button has a solid background, with no transparent or outline buttons.
- **Centred titles and paragraphs** have no max-width.
- **Service, location, sector and post cards:** the whole card is a link.
- **Scroll to top:** it moves up above the Google reCAPTCHA badge when one is on the page (the badge is detected automatically).
- **Animations:** scroll reveal, staggered cards, parallax backgrounds, animated counters, a partner logo marquee, a scroll progress bar, a scroll-to-top progress ring, a process line that draws itself, and hover effects. All motion respects `prefers-reduced-motion`.

## Forms

The built-in forms email the recipient set in the Customizer (or the site admin email if none is set). They include a nonce, a honeypot and inline validation. To use a plugin instead (Contact Form 7, Gravity Forms, WPForms), paste its shortcode into **Customizer > F4 Theme Settings > Forms**. If you use reCAPTCHA v3 through a plugin, the scroll-to-top button moves above the badge automatically.

Developers can hook `f4_form_submitted` to send leads to a CRM.

## Editing content

The page copy lives in `inc/data.php`. Anything typed into a page's editor also shows inside that page's template, so you can add extra content without touching code.
