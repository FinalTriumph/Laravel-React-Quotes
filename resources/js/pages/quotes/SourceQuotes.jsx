import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';

export default function SourceQuotes({ page, source }) {
    return (
        <div className="text-left">
            <div className="bg-custom-neutral-1 shadow py-4 px-6 mb-4">
                <h1 className="font-bold">Quotes from source: {source}</h1>
            </div>
            <QuotesContainer type="source" page={page} source={source} />
        </div>
    );
}