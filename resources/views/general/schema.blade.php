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

	@if($schemaPhone)
    "telephone": [
    @foreach($place->phone as $key => $phone)
        "{{$phone}}" {{$key != count($place->phone)-1 ? ',': ''}}
    @endforeach
    ],
	@endif
    @if(count($sitePics) > 0)
    "image": [
        {
            "@type": "ImageObject",
            "caption": "{{$sitePics[0]['alt']}}",
            "contentUrl": "{{$sitePics[0]['s']}}",
            "accountablePerson": {
                "@type": "Person",
                "additionalName": "{{$sitePics[0]['name']}}",
                "image": "{{$sitePics[0]['s']}}"
            }
{{--                "uploadDate": "{{$photographerPics[$i]['fromUpload']}}"--}}
        }
    ],
    @endif
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
            "reviewCount": "{{$reviewCount}}",
            "bestRating": "5",
            "worstRating": "1"
        }
    ],
    @if(isset($place->C))
    "latitude":	"{{$place->C}}",
    @endif
    @if(isset($place->D))
        "longitude": "{{$place->D}}",
    @endif
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
            "interactionStatistic": {
                "@type": "InteractionCounter",
                "interactionType": "https://schema.org/LikeActin",
                "userInteractionCount": "{{$place->firstReview->like}}"
            },
            "interactionStatistic": {
                "@type": "InteractionCounter",
                "interactionType": "https://schema.org/DislikeActin",
                "userInteractionCount": "{{$place->firstReview->disLike}}"
            },
            "dateCreated": "{{$place->firstReview->created_at}} +3:30"
            "sameAs": "{{$place->firstReview->placeUrl}}"
        },
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