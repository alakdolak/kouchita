<?php

    if(isset($place->address))
        $schemaAddress = $place->address;
    else if(isset($place->dastresi))
        $schemaAddress = $place->dastresi;
    else
        $schemaAddress = false;

    $schemaPhone = false;
    if(isset($place->phone) && is_array($place->phone) && count($place->phone) > 0)
            $schemaPhone = true;
?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    @if($kindPlaceId == 1)
    @elseif($kindPlaceId == 3)
    @elseif($kindPlaceId == 4)
        "@type": "Hotel",
        "starRating":"{{$place->rate}}",
{{--        "checkinTime":	"hh:mm:ss[Z|(+)03:30]",--}}
{{--        "checkoutTime":	"hh:mm:ss[Z|(+)03:30]",--}}
{{--        "numberOfRooms":"تعداد اتاق",--}}
    @elseif($kindPlaceId == 6)
    @elseif($kindPlaceId == 10)
    @elseif($kindPlaceId == 11)
    @elseif($kindPlaceId == 12)
    @endif

    "image": [
        {
            "@type": "ImageObject",
            "caption": "{{$place->keyword}}",
            "contentUrl": "{{$place->mainPic}}",
            "url": "{{$place->mainPic}}"
        }
    ],
    @if($schemaAddress != false)
    "address":[
        {
            "@type": "PostalAddress",
            "streetAddress": "{{$schemaAddress}}",
            "addressCountry": "IR",
            "addressRegion": "{{$city->name}}"
        }
    ],
    @endif
    "aggregateRating":[
        {
            "ratingCount": "{{$total}}",
            "reviewCount": "{{$reviewCount == 0 ? 1 : $reviewCount}}",
            "bestRating": "5",
            "ratingValue": "{{$avgRate}}",
            "worstRating": "1"
        }
    ],
    "description":"{{$place->meta}}",
    @if(isset($place->firstReview))
    "review":[
        {
            "@type": "Review",
            "itemReviewed":{
                "@type": "Thing",
                "name": "{{$place->firstReview->placeName}}",
                "image": "{{$place->firstReview->placeUrl}}"
            },
{{--            "reviewAspect": "مبدا و فصل",--}}
            "reviewBody": "{{$place->firstReview->text}}",
            "author":  {
                "@type": "Person",
                "additionalName": "{{$place->firstReview->userName}}",
                "image": "{{$place->firstReview->userPic}}"
            },
            "commentCount": "Integer ",
            "interactionStatistic": [
                {
                    "@type": "InteractionCounter",
                    "interactionType": "https://schema.org/LikeActin",
                    "userInteractionCount": "{{$place->firstReview->like}}"
                },
                {
                    "@type": "InteractionCounter",
                    "interactionType": "https://schema.org/DislikeActin",
                    "userInteractionCount": "{{$place->firstReview->disLike}}"
                }
            ],
            "dateCreated": "{{$place->firstReview->created_at}} +3:30",
            "sameAs": "{{$place->firstReview->placeUrl}}"
        }
    ],
    @endif
    @if(isset($place->firstQuestion))
    "Question":[
        {
            "about": "{{$place->firstQuestion->placeName}}",
            "abstract": "{{$place->firstQuestion->text}}",
            "answerCount": "{{$place->firstQuestion->answersCount}}",
            "author": {
                "@type": "Person",
                "additionalName": "{{$place->firstQuestion->userName}}",
                "image": "{{$place->firstQuestion->userPic}}"
            },
            @if(isset($place->firstQuestion->answers[0]))
            "acceptedAnswer": {
                "@type": "Answer",
                "abstract": "{{$place->firstQuestion->answers[0]->text}}",
                "author":  {
                    "@type": "Person",
                    "additionalName": "{{$place->firstQuestion->answers[0]->userName}}",
                    "image": "{{$place->firstQuestion->answers[0]->writerPic}}"
                }
            },
            @endif
{{--            "interactionStatistic": {--}}
{{--                "@type": "InteractionCounter",--}}
{{--                "interactionType": "https://schema.org/LikeActin",--}}
{{--                "userInteractionCount": "تعداد"--}}
{{--            },--}}
{{--            "interactionStatistic": {--}}
{{--                "@type": "InteractionCounter",--}}
{{--                "interactionType": "https://schema.org/DislikeActin",--}}
{{--                "userInteractionCount": "تعداد"--}}
{{--            },--}}
            "dateCreated": "{{$place->firstReview->created_at}} +3:30"
        }
    ],
    @endif

    "audience": [
        {
            "@type": "Audience",
            "audienceType": "tourist"
        }
    ],
    "availableLanguage": [
            "en",
            "pr",
            "fr",
            "ar"
    ],
    "name": "{{$place->name}}",
	"url": "{{Request::url()}}"
},
</script>