import React from 'react';
import Quote from './Quote.jsx';

export default function QuotesGrid({ quotes, onDelete }) {
    if (!quotes) {
        return (null);
    }

    if (!quotes.length) {
        return (
            <div className="m-4 px-6">
                <p>No results</p>
            </div>
        )
    }

    return (
        <div className="grid grid-cols-2">
            {quotes.map(quote => (
                <Quote
                    key={quote.id}
                    quote={quote}
                    onDelete={onDelete}
                />
            ))}
        </div>
    );
}