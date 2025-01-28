import React from 'react';
import Quote from './Quote.jsx';

export default function QuotesGrid({ quotes }) {
    if (!quotes) {
        return (null);
    }

    return (
        <div className="grid grid-cols-2">
            {quotes.map((quote) => <Quote quote={quote} key={quote.id} />)}
        </div>
    );
}