import React from 'react';
import Source from '../randomQuote/Source'

export default function Quote({ quote, sourceTitle, onDelete }) {
    if (!quote) {
        return (null);
    }

    return (
        <div className="flex flex-col relative p-8 m-2 bg-white border border-custom-neutral-2 shadow rounded-lg">
            {quote.savedByMe && (
                <button
                    className="absolute top-1 right-2 text-custom-primary-2 hover:text-red-500"
                    onClick={() => onDelete(quote.id)}
                >
                    &#x2715;
                </button>
            )}
            <Source source={quote.source} title={sourceTitle} />
            <p className="font-bold">{quote.text}</p>
            <p className="mb-4">- {quote.author}</p>
            <div className="flex mt-auto text-sm">
                <a
                    href={`/quotes/user/${quote.userId}`}
                    className="mr-auto text-custom-accent hover:opacity-80"
                >
                    {quote.savedBy}
                </a>
                <p className="text-custom-accent">{quote.savedAt}</p>
            </div>
        </div>
    );
}
