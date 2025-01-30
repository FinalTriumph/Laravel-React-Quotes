import React from 'react';

export default function Quote({ quote }) {
    if (!quote) {
        return (null);
    }

    return (
        <div className="flex flex-col p-8 m-2 border border-custom-neutral-2 shadow">
            <p className="font-bold">{quote.quote}</p>
            <p className="mb-4">- {quote.author}</p>
            <div className="flex mt-auto text-sm">
                <p className="text-custom-accent mr-auto">{quote.savedBy}</p>
                <p className="text-custom-accent">{quote.savedAt}</p>
            </div>
        </div>
    );
}