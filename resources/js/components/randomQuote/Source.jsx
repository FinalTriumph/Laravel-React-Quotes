import React from 'react';

// TODO Perhaps this could be be moved to '/app/Plugins/RandomQuote.php'?
const sources = {
    'forismatic': {
        'title': 'Forismatic',
        'website': 'https://www.forismatic.com/en/'
    },
    'quoterism': {
        'title': 'Quoterism',
        'website': 'https://www.quoterism.com/'
    },
    'zen': {
        'title': 'Zen Quotes',
        'website': 'https://zenquotes.io/'
    },
    'programming': {
        'title': 'Programming Quotes',
        'website': 'https://programming-quotes-api.azurewebsites.net/'
    },
};

export default function Source({ source }) {
    if (!source) {
        return (null);
    }

    if (sources[source] === undefined) {
        return (
            <p className="text-custom-accent text-sm italic mb-4">
                source: {source}
            </p>
        );
    }

    return (
        <div className="text-sm italic mb-4">
            <p className="text-custom-accent">{sources[source].title}</p>
            <a
                className="text-custom-primary-2 hover:text-custom-primary-1"
                href={sources[source].website}
                target="_blank"
            >
                {sources[source].website}
            </a>
        </div>
    );
}