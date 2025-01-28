import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';

export default function MyQuotes({ name, email }) {
    return (
        <div>
            <p className="mx-4 mb-4">My Quotes ({name}, {email})</p>
            <QuotesContainer type="my" />
        </div>
    );
}