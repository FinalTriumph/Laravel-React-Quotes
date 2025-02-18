import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';
import SectionTitle from '../../components/SectionTitle.jsx';

export default function MyQuotes({ name, email, page }) {
    return (
        <div className="text-left">
            <SectionTitle title="My Saved Quotes" />
            <QuotesContainer type="my" page={page} />
        </div>
    );
}