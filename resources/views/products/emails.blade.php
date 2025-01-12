@extends('layouts.clean')
@section('title', $title)
@section('meta_image', $image['url'])
@section('meta_description', strip_tags(Illuminate\Mail\Markdown::parse(str_limit($text, $limit = 150, $end = '...'))) )

@section('above_container')

<script type="application/ld+json">
    {
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "{{$title}}",
  "image": [
    "{{$image['url']}}"
   ],
  "description": "{{ strip_tags(Illuminate\Mail\Markdown::parse(str_limit($text, $limit = 150, $end = '...'))) }}",
  "brand": {
    "@type": "Thing",
    "name": "{{config('app.name')}}"
  },
  "review": [
    {
      "@type": "Review",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5"
      },
      "author": {
        "@type": "Person",
        "name": "Katarzyna Gardapkhadze"
      },
      "reviewBody": "M Media is our partner of choice for developing website and branding for our new consultancy business. Excellent sense of customer needs and high-quality, data-driven solutions is what distinguishes M Media from other companies in the field."
    },
    {
      "@type": "Review",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5"
      },
      "author": {
        "@type": "Person",
        "name": "Benjamin Kalies"
      },
      "reviewBody": "Very serious company and very professionnel. M Media is exactly what I was looking for for my company, and they know how to make custom my strategy for my restaurant. Congtatulation !!!"
    },
    {
      "@type": "Review",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5"
      },
      "author": {
        "@type": "Person",
        "name": "Anthony Alessandra"
      },
      "reviewBody": "Thanks to M Media for your bespoke service! I have no doubts today, the results are there!"
    }
  ],
  "aggregateRating": {
    "@type": "AggregateRating",
    "bestRating": "5",
    "ratingValue": "5",
    "reviewCount": "3"
  },
  "offers": {
    "@type": "Offer",
    "url": "{{url()->full()}}",
    "priceCurrency": "{{$price[0]['currency']['ISO']}}",
    "price": "{{$price[0]['value']}}",
    "itemCondition": "https://schema.org/NewCondition",
    "availability": "https://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "{{config('app.name')}}"
    }
  }
}
</script>
    <div class="header-section text-white" style="background: var(--black);">
        <h1 class="header-section-title mb-0">Secure and private websites</h1>
        <p class="mb-0" data-aos="fade">By default</p>
    </div>

    <div class="header-section row m-0 text-white" style="background: var(--black);">
        <div class="six columns order-md-12 mb-5 flex" data-aos="fade-left">
            <img src="/images/devices2.svg" alt="Multiple devices showing responsive websites" class="u-full-width mb-0">
        </div>
        <div class="six columns order-md-6" data-aos="fade-right">
            <h3 class="mt-0">Look great on phones and computers alike.</h3>
            <p>TV's, projectors, tablets, smartphones, laptops, and computers. Whatever device, your website looks great. Heck, you could even browse the site in a Tesla and it'll look great. Just make sure you're parked!</p><p>All our websites are responsive from the get-go, so you don't have to worry about how your site will look on your clients devices. It'll look great. Always.</p>
        </div>
    </div>

    <div class="header-section row m-0 text-white" style="background: var(--black);">
        <div class="twelve columns">
            <div class="u-limit-max-width u-center" data-aos="fade">
                <img src="/images/seo.svg" alt="Multiple devices showing responsive websites" class="u-limit-max-width mb-5">
           </div>
            <h3 class="mt-0 u-center" data-aos="fade-up">Even Grandma will find you on Google.</h3>
            <p class="u-center" data-aos="fade-up">Our websites make friends with search engines. We optimize sites to be clearly understood by major search engines, and we make sure that as they update their code (we're looking at you, Google), your site will be updated as well.</p>
            <p class="u-center" data-aos="fade-up">You'll rank well when your customers search for your brand, your products, and your services. We do this not by milking keywords and using shady techniques, but by satisfying your customer. When your customer is satisfied, then Google is satisfied too.</p>
            <p class="u-center" data-aos="fade-up">Just think about all the questions you've Googled and how the first couple of links answered your question. That's because Google is very good at understanding what you and your customers are looking for, and where to find it. The trick to ranking well is therefore to satisfy the needs of your customers. We do this by finding and suggesting improvements to your content depth and density.</p>
        </div>
    </div>

    <div class="header-section row m-0 text-white" style="background: var(--black);">
        <div class="six columns order-md-6 mb-5 flex" data-aos="fade-right">
            <img src="/images/webspeed.svg" alt="Multiple devices showing responsive websites" class="u-full-width mb-0">
        </div>
        <div class="six columns order-md-12" data-aos="fade-left">
            <h3 class="mt-0">Whoosh! So fast.</h3>
            <p>Nobody likes a slow website. For every additional second that it takes your website to load, you lose around 7% of your customers (source and more info on page speed importance). Page speed is also crucial to SEO and ranking well on search engines like Google.</p>
            <p class="d-none">Because our sites are built from scratch, we include just the right amount of code that is needed to get a given task done; no more, no less. If you've ever used WordPress before, you've surely experienced situations where plugins do way more than you need, and cause the website to slow down. Or they don't do enough, so you need multiple plugins to achieve whatever you need to do.</p>
            <p>We build websites tailored to your business needs using custom code on the Laravel framework. You don't have to know what that means, but it's enough to understand that your website is tailor made to meet your business needs while being blazingly fast.</p>
        </div>
    </div>

<div class="header-section row m-0 text-white" style="background: var(--black);">
    <div class="six columns order-md-12 mb-5 flex" data-aos="fade-left">
        <img src="/images/analytics.svg" alt="Multiple devices showing responsive websites" class="u-full-width mb-0">
    </div>
    <div class="six columns order-md-6" data-aos="fade-right">
        <h3 class="mt-0">Wow. Customers from where?!</h3>
        <p>See how many people saw your website, your best performing pages, bounce rate, session views, and many more metrics. </p><p>You'll have access to this data from day one, and we'll be happy to help you understand all the metrics you have access to.</p>
    </div>
</div>

<div class="header-section row m-0 text-white" style="background: var(--black);">
    <div class="six columns order-md-6 mb-5 flex" data-aos="fade-right">
        <img src="/images/webscale.svg" alt="Multiple devices showing responsive websites" class="u-full-width mb-0">
    </div>
    <div class="six columns order-md-12" data-aos="fade-left">
        <h3 class="mt-0">From 1 to 1 million, there's enough for everyone visiting.</h3>
        <p>From one user a day to millions, your website can scale across servers so seamlessly that you won't even notice it happen. If there's a temporary surge in people visiting your website, we'll automatically increase server size to allow each of them to have an incredibly fast experience. When the surge is over, we'll scale back the server size to help you save costs.</p>
    </div>
</div>
  <div class="header-section row m-0 text-white" style="background: var(--black);">
        <div class="twelve columns">
            <div class="u-limit-max-width u-center" data-aos="fade">
                <img src="/images/abtesting.svg" alt="Multiple devices showing responsive websites" class="u-limit-max-width mb-5">
           </div>
            <h3 class="mt-0 u-center" data-aos="fade-up">Hmm... blue or red? There's an answer.</h3>
            <p class="u-center" data-aos="fade-up">Not sure if you prefer blue or red on your website? There's a correct answer - and it's called data. We can run multiple versions of your website, each slightly different from the other, to understand how the slight variations affect your customers behaviour on the website.</p>
            <p class="u-center" data-aos="fade-up">We'll see how each version performs thanks to the advanced analytics systems we build into every website, so you'll be able to understand what turns potential customers into customers, and how to capitalize on that.</p>
        </div>
    </div>
<div class="header-section row m-0 text-white" style="background: var(--black);">
    <div class="six columns order-md-12 mb-5 flex" data-aos="fade-left">
        <img src="/images/loveweb.svg" alt="Multiple devices showing responsive websites" class="u-full-width mb-0">
    </div>
    <div class="six columns order-md-6" data-aos="fade-right">
        <h3 class="mt-0">Can I...<br/>Yes!</h3>
        <p>Whether it's using Facebook for logging in, or having new customers added automatically to your Mailchimp list, our websites can easily communicate with other websites and services to effortlessly share data and tasks.</p>
        <p>There's little need to change your existing business workflow. We believe websites should work for you instead of you having to work on them. Websites we build reflect that by integrating with your existing way of doing business.</p>
    </div>
</div>
<div class="header-section row m-0 text-white" style="background: var(--black);">
    <div class="six columns order-md-6 mb-5 flex" data-aos="fade-right">
        <img src="/images/emails.svg" alt="Multiple devices showing responsive websites" class="u-full-width mb-0">
    </div>
    <div class="six columns order-md-12" data-aos="fade-left">
        <h3 class="mt-0">Oh. Hello.</h3>
        <p>You can have your own company email address ending with @your-domain.com (where your-domain is the name of your company). Oh, and since we're M Media - we automate this too. Your website will be able to send clients automatic email reminders, requests, or notifications.</p>
        <p>Thanks to our flexible communication with other services, your email address can easily be integrated with external mailing services like Mailchimp too.</p>
    </div>
</div>
<div class="header-section row m-0 text-white" style="background: var(--black);">
    <div class="twelve columns">
        <div class="u-limit-max-width u-center d-none" data-aos="fade">
              <img src="/images/stars.png" alt="Multiple devices showing responsive websites" class="u-limit-max-width mb-5" style="max-width: 200px;">
        </div>
        <blockquote class="blockquote m-0" data-aos="fade">
          <p class="u-center">"Thanks to M Media for your bespoke service! I have no doubts today, the results are there!"</p>
          <p class="blockquote-footer u-center text-small">Anthony Alessandra, CEO of <cite title="Source Title">Nicolas Pisani Real Estate</cite></p>
        </blockquote>
    </div>
</div>
 <div class="header-section bg-secondary row m-0">
        <div class="twelve columns u-center-text">
            <div class="flex" style="flex-wrap: wrap; flex-direction: column;">
                <h3 data-aos="fade">Websites starting at €999</h3>
                <p data-aos="fade" data-aos-delay="300">Hosting from €15 a month</p>
                <a class="button button-primary" href="/contact">Let's talk :)</a>
                <a class="button button-primary text-white d-none" href="/case-studies/justbookr">Read a start-up case study</a>
            </div>
        </div>
    </div>

@endsection
