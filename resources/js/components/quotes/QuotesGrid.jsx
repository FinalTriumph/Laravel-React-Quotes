import React from 'react';
import Quote from './Quote.jsx';

export default function QuotesGrid({ quotes, onDelete }) {
    if (!quotes) {
        return (null);
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