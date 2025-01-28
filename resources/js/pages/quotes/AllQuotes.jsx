import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';

export default function AllQuotes() {
    return (
        <div>
            <p className="mx-4 mb-4">All Quotes</p>
            <QuotesContainer type="all" />
        </div>
    );
}